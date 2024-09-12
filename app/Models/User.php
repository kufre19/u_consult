<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Account;
use Stripe\AccountLink;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'other_name', 'email', 'password', 'country',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function hasCompletedStripeOnboarding()
    {
        if ($this->stripe_onboarding_status === 'completed') {
            return true;
        }

        if (!$this->stripe_account_id) {
            return false;
        }

        Stripe::setApiKey(env('STRIPE_SK'));

        try {
            $account = Account::retrieve($this->stripe_account_id);
            $isCompleted = $account->details_submitted 
                && $account->payouts_enabled 
                && $account->charges_enabled;

            if ($isCompleted) {
                $this->stripe_onboarding_status = 'completed';
                $this->save();
            }

            return $isCompleted;
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error checking Stripe account status: ' . $e->getMessage());
            return false;
        }
    }
}
