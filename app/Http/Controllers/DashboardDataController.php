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
        $invoices = $request->user()->invoices()->orderBy('created_at', 'desc')->get();

        return DataTables::of($invoices)
            ->addColumn('id', function ($invoice) {
                return $invoice->stripe_invoice_id;
            })
            ->addColumn('client_name', function ($invoice) {
                return $invoice->client_name;
            })
            ->addColumn('status', function ($invoice) {
                return ucfirst($invoice->status);
            })
            ->addColumn('amount', function ($invoice) {
                return number_format($invoice->amount, 2);
            })
            ->addColumn('invoice_url', function ($invoice) {
                return '<a href="' . $invoice->invoice_url . '" class="btn btn-sm btn-primary" target="_blank">View</a>';
            })
            ->addColumn('created_at', function ($invoice) {
                return $invoice->stripe_created_at->format('d-M-Y');
            })
            ->rawColumns(['invoice_url'])
            ->make(true);
    }

    public function getTransactions(Request $request)
    {
        $transactions = $this->getConnectedAccountTransactions(Auth::user()->stripe_account_id);

        return DataTables::of($transactions)
            ->addColumn('id', function ($transaction) {
                return $transaction->id;
            })
            ->addColumn('amount', function ($transaction) {
                return number_format(($transaction->amount / 100), 2);
            })

            ->addColumn('type', function ($transaction) {
                return $transaction->object;
            })
            ->addColumn('status', function ($transaction) {
                return ucfirst($transaction->status);
            })
            ->addColumn('created_at', function ($transaction) {
                return Date("d-M-Y", $transaction->created);
            })

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

    public function clientList()
    {
        return view('app.client');
    }
}
