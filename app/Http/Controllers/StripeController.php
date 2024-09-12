<?php

namespace App\Http\Controllers;

use App\Traits\StripeDataTrait;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    use StripeDataTrait;

    public function getCustomers(Request $request)
    {
        try {
            $connectedAccountId = $request->user()->stripe_account_id;
            $customers = $this->getConnectedAccountCustomers($connectedAccountId);
            return response()->json($customers);
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

            $connectedAccountId = $request->user()->stripe_account_id;
            $invoice = $this->createConnectedAccountInvoice($connectedAccountId, $validatedData);

            return response()->json(['success' => true, 'invoice' => $invoice]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
