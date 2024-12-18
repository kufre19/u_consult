<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Invoice;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\InvoiceItem;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

trait StripeDataTrait
{
    protected function setStripeKey()
    {
        Stripe::setApiKey(env('STRIPE_SK'));
    }

    public function getConnectedAccountInvoices($connectedAccountId)
    {
        $this->setStripeKey();
        $invoices = Invoice::all([
            'limit' => 100, // Adjust as needed
        ], ['stripe_account' => $connectedAccountId]);
        
        return $invoices->data;
    }

    public function getConnectedAccountTransactions($connectedAccountId)
    {
        $this->setStripeKey();
        $charges = Charge::all([
            'limit' => 100, // Adjust as needed
        ], ['stripe_account' => $connectedAccountId]);
        
        return $charges->data;
    }


    public function getConnectedAccountCustomers (Request $request)
    {
        $clients = $request->user()->clients;
        return response()->json($clients);
    }

    public function getClients(Request $request)
    {
        $clients = $request->user()->clients;

        return DataTables::of($clients)
            ->addColumn('name', function ($client) {
                return $client->name;
            })
            ->addColumn('email', function ($client) {
                return $client->email;
            })
            ->addColumn('actions', function ($client) {
                return '<a href="' . ''. '" class="btn btn-sm btn-primary">View</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function getCustomers($connectedAccountId)
    {
        $this->setStripeKey();
        $customers = Customer::all([
            'limit' => 100, // Adjust as needed
        ], ['stripe_account' => $connectedAccountId]);
        
        return $customers->data;
    }

    public function createConnectedAccountInvoice($connectedAccountId, $data)
    {
        $this->setStripeKey();

        try {
            // Create an invoice item
            $invoiceItem = InvoiceItem::create([
                'customer' => $data['client_id'],
                'amount' => $data['amount'] * 100, // Stripe uses cents
                'currency' => $data['currency'],
                'description' => $data['description'],
            ], ['stripe_account' => $connectedAccountId]);

            // Create the invoice
            $invoice = Invoice::create([
                'customer' => $data['client_id'],
                'collection_method' => 'send_invoice',
                'due_date' => strtotime($data['due_date']),
                'auto_advance' => true, // Automatically finalize the invoice
            ], ['stripe_account' => $connectedAccountId]);

            // Finalize and send the invoice
            $invoice->finalizeInvoice();
            $invoice->sendInvoice();

            return $invoice;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createCustomer(Request $request)
    {
        $this->setStripeKey();

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                // 'phone' => 'nullable|string',
            ]);

            $connectedAccountId = $request->user()->stripe_account_id;

            $stripeCustomer = Customer::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                // 'phone' => $validatedData['phone'],
            ]);

            $client = $request->user()->clients()->create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                // 'phone' => $validatedData['phone'],
                'stripe_customer_id' => $stripeCustomer->id,
            ]);


            return response()->json(['success' => true, 'client' => $client]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function createInvoice(Request $request)
    {
        $this->setStripeKey();

        try {
            $validatedData = $request->validate([
                'client_id' => 'required|string',
                'currency' => 'required|string',
                'due_date' => 'required|date',
                'items' => 'required|array',
                'items.*.description' => 'required|string',
                'items.*.amount' => 'required|numeric',
            ]);

            $connectedAccountId = $request->user()->stripe_account_id;

            // Create the invoice first
            $invoice = Invoice::create([
                'customer' => $validatedData['client_id'],
                'collection_method' => 'send_invoice',
                'due_date' => Carbon::parse($validatedData['due_date'])->timestamp,
                'auto_advance' => false, // Set to false so we can add items before finalizing
                'currency' => $validatedData['currency'],
                // 'on_behalf_of'=> $connectedAccountId,
                'transfer_data' => [
                    'destination' => $connectedAccountId,
                  ],

                'custom_fields' => [
                    [
                        "name"=>"Sent By",
                        "value"=>"{$request->user()->first_name} {$request->user()->last_name}",
                    ]
                ],
               
            ]);

            // Calculate total amount
            $totalAmount = 0;

            // Add items to the invoice
            foreach ($validatedData['items'] as $item) {
                $amount = $item['amount'] * 100; // Convert to cents
                $totalAmount += $amount;

                InvoiceItem::create([
                    'customer' => $validatedData['client_id'],
                    'invoice' => $invoice->id,
                    'amount' => $amount,
                    'currency' => $validatedData['currency'],
                    'description' => $item['description'],
                ]);
            }

            // Update invoice with total amount
            $invoice = Invoice::update($invoice->id, [
                'auto_advance' => true,
                
            ]);

          

            // Finalize and send the invoice
            $invoice->finalizeInvoice();
            $invoice->sendInvoice();

             // Retrieve the customer name
        $customer = \Stripe\Customer::retrieve($validatedData['client_id']);

        // Store the invoice in your database
        $new_invoice = $request->user()->invoices()->create([
            'stripe_invoice_id' => $invoice->id,
            'client_name' => $customer->name ?? $customer->email,
            'status' => $invoice->status,
            'amount' => $invoice->total / 100, // Convert cents to dollars
            'currency' => $invoice->currency,
            'invoice_url' => $invoice->hosted_invoice_url,
            'stripe_created_at' => Carbon::createFromTimestamp($invoice->created),
            'due_date' => Carbon::parse($validatedData['due_date']),
        ]);


            return response()->json(['success' => true, 'invoice' => $new_invoice]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    
}