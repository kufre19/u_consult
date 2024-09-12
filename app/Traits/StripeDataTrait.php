<?php

namespace App\Traits;

use Stripe\Stripe;
use Stripe\Invoice;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\InvoiceItem;

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



    public function getConnectedAccountCustomers($connectedAccountId)
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

    
}