<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function getCustomers()
    {
        try {
            $customers = Customer::all(['limit' => 100]);
            return response()->json($customers->data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createInvoice(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'client_id' => 'required|string',
                'amount' => 'required|numeric',
                'currency' => 'required|string',
                'description' => 'required|string',
                'due_date' => 'required|date',
            ]);

            // Create an invoice item
            InvoiceItem::create([
                'customer' => $validatedData['client_id'],
                'amount' => $validatedData['amount'] * 100, // Stripe uses cents
                'currency' => $validatedData['currency'],
                'description' => $validatedData['description'],
            ]);

            // Create the invoice
            $invoice = Invoice::create([
                'customer' => $validatedData['client_id'],
                'collection_method' => 'send_invoice',
                'due_date' => strtotime($validatedData['due_date']),
            ]);

            // Finalize the invoice
            $invoice->finalizeInvoice();

            return response()->json(['success' => true, 'invoice' => $invoice]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }}
