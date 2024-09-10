<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StripeDataTrait;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardDataController extends Controller
{
    use StripeDataTrait;


    public function getInvoices(Request $request)
    {
        $invoices = $this->getConnectedAccountInvoices(Auth::user()->stripe_account_id);

        return DataTables::of($invoices)
            ->addColumn('client_name', function ($invoice) {
                return $invoice->customer_name;
            })
            ->addColumn('status', function ($invoice) {
                return ucfirst($invoice->status);
            })
            ->addColumn('invoice_url', function ($invoice) {
                return '<a href="' . $invoice->hosted_invoice_url . '" class="btn btn-sm btn-primary" target="_blank">View</a>';
            })
            ->rawColumns(['invoice_url'])
            ->make(true);
    }

    public function getTransactions(Request $request)
    {
        $transactions = $this->getConnectedAccountTransactions(Auth::user()->stripe_account_id);

        return DataTables::of($transactions)
            ->addColumn('type', function ($transaction) {
                return $transaction->object;
            })
            ->addColumn('status', function ($transaction) {
                return ucfirst($transaction->status);
            })
            ->make(true);
    }

    public function getClients(Request $request)
    {
        $clients = $this->getConnectedAccountCustomers(Auth::user()->stripe_account_id);

        return DataTables::of($clients)
            ->addColumn('name', function ($client) {
                return $client->name;
            })
            ->addColumn('email', function ($client) {
                return $client->email;
            })
            ->addColumn('actions', function ($client) {
                return '<a href="' . route('clients.show', $client->id) . '" class="btn btn-sm btn-primary">View</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function invoicesList()
    {
        return view('app.invoices');
    }

    public function transactionsList()
    {
        return view('app.transaction-list');
    }
}