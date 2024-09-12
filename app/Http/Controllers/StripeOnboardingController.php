<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Account;
use Stripe\AccountLink;

class StripeOnboardingController extends Controller
{
    public function initiateOnboarding(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SK'));

        $user = $request->user();

        if (!$user->stripe_account_id) {
            $account = Account::create([
                'type' => 'express',
                'email' => $user->email,
                'country' => $user->country, // Use the user's country
                
                'business_type' => 'individual', // Pre-set business type
                'business_profile' => [
                    'mcc' => '5734', // Computer Software Stores (adjust as needed)
                    'url' => null, // Omit business URL
                ],
                'individual' => [
                    'email' => $user->email, // Use existing email
                ],
            ]);

            $user->stripe_account_id = $account->id;
            $user->stripe_onboarding_status = 'started';
            $user->save();
        }

        $accountLink = AccountLink::create([
            'account' => $user->stripe_account_id,
            'refresh_url' => route('stripe.onboarding'),
            'return_url' => route('stripe.onboarding.complete'),
            'type' => 'account_onboarding',
            'collect' => 'currently_due',
           
        ]);

        return redirect($accountLink->url);
    }
    public function completeOnboarding(Request $request)
    {
        $user = $request->user();
        
        Stripe::setApiKey(env('STRIPE_SK'));
        $account = Account::retrieve($user->stripe_account_id);
        
        if ($account->details_submitted && $account->payouts_enabled && $account->charges_enabled) {
            $user->stripe_onboarding_status = 'completed';
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Stripe onboarding completed successfully!');
        } else {
            return redirect()->route('stripe.onboarding')->with('error', 'Onboarding not completed. Please try again.');
        }
    }

    public function deleteAccount(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SK'));

     
        try {
            $account = Account::retrieve("acct_1PqwEdGfqnimjlz8");
            $account->delete();

          
            return response()->json(['message' => 'Stripe account deleted successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting Stripe account: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete Stripe account.'], 500);
        }
    }
}
