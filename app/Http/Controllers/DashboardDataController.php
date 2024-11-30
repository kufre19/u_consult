<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StripeDataTrait;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\Client;

class DashboardDataController extends Controller
{
    use StripeDataTrait;


    public function getInvoices()
    {
        $invoices = Invoice::with('client')
            ->select([
                'id',
                'stripe_invoice_id',
                'client_id',
                'amount',
                'status',
                'stripe_created_at',
                'invoice_url'
            ])
            ->latest()
            ->get()
            ->map(function ($invoice) {
                return [
                    'id' => $invoice->stripe_invoice_id,
                    'client_name' => $invoice->client->name ?? 'N/A',
                    'amount' => number_format($invoice->amount, 2),
                    'due_date' => $invoice->stripe_created_at->format('d M, y'),
                    'status' => $this->determineStatus($invoice),
                    'action' => 'view'
                ];
            });

        return response()->json($invoices);
    }

    private function determineStatus($invoice)
    {
        if ($invoice->status === 'paid') return 'paid';
        if ($invoice->status === 'pending') return 'awaiting';
        if ($invoice->stripe_created_at->addDays(30)->isPast()) return 'overdue';
        return 'awaiting';
    }

    public function getTransactions()
    {
        $transactions = Transaction::latest()
            ->get()
            ->map(function ($transaction) {
                return [
                    'id' => $transaction->id,
                    'amount' => number_format($transaction->amount, 2),
                    'type' => $transaction->type,
                    'status' => $transaction->status,
                    'created_at' => $transaction->created_at->format('d M, Y'),
                    'action' => 'view'
                ];
            });

        return response()->json($transactions);
    }

    public function getClients()
    {
        $clients = Client::latest()
            ->get()
            ->map(function ($client) {
                return [
                    'name' => $client->name,
                    'email' => $client->email,
                    'phone' => $client->phone ?? 'N/A',
                    'status' => $client->status,
                    'created_at' => $client->created_at->format('d M, Y'),
                    'action' => 'view'
                ];
            });

        return response()->json($clients);
    }

    public function invoicesList()
    {
        return view('app.invoices');
    }

    public function transactionsList()
    {
        return view('app.transaction-list');
    }

    public function clientList()
    {
        return view('app.client');
    }
}
