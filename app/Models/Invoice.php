<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stripe_invoice_id',
        'client_name',
        'status',
        'amount',
        'currency',
        'invoice_url',
        'stripe_created_at',
        'due_date',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'stripe_created_at' => 'datetime',
        'due_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
