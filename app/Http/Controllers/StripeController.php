<?php

namespace App\Http\Controllers;

use App\Traits\StripeDataTrait;
use Illuminate\Http\Request;
use Stripe\Customer;


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

   
  



}
