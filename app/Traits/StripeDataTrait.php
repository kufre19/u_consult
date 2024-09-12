<?php

namespace App\Traits;

use Stripe\Stripe;
use Stripe\Invoice;
use Stripe\Charge;
use Stripe\Customer;

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

    
}