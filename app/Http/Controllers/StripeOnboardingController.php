<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        ]);

        return redirect($accountLink->url);
    }

    public function completeOnboarding(Request $request)
    {
        $user = $request->user();
        $user->stripe_onboarding_status = 'completed';
        $user->save();

        return redirect()->route('dashboard');
    }
}
