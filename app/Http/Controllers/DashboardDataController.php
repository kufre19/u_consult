<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use Yajra\DataTables\Facades\DataTables;

class DashboardDataController extends Controller
{
    public function getInvoices(Request $request)
    {
        $invoices = Invoice::where('user_id', $request->user()->id);

        return DataTables::of($invoices)
            ->addColumn('client_name', function ($invoice) {
                return $invoice->client->name;
            })
            ->addColumn('status', function ($invoice) {
                return ucfirst($invoice->status);
            })
            ->addColumn('invoice_url', function ($invoice) {
                return '<a href="' . route('invoice.show', $invoice->id) . '" class="btn btn-sm btn-primary">View</a>';
            })
            ->rawColumns(['invoice_url'])
            ->make(true);
    }

    public function getTransactions(Request $request)
    {
        $transactions = Transaction::where('user_id', $request->user()->id);

        return DataTables::of($transactions)
            ->addColumn('type', function ($transaction) {
                return ucfirst($transaction->type);
            })
            ->addColumn('status', function ($transaction) {
                return ucfirst($transaction->status);
            })
            ->make(true);
    }

    public function invoicesList()
    {
        return view('invoices.list');
    }

    public function transactionsList()
    {
        return view('transactions.list');
    }
}