@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <div class="breadcrumb-title pe-3">Invoices</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="action-button">
                    @if (auth()->user()->hasCompletedStripeOnboarding())
                        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal"
                            data-bs-target="#createInvoiceModal"><i class="fa fa-plus"></i> New Invoice</button>
                    @else
                        <a href="{{ route('stripe.onboarding') }}" class="btn btn-alt-primary">Verify Account</a>
                    @endif
                </div>
            </div>
            <!--end breadcrumb-->

        
            <x-data-table 
            title="Invoices"
            description="see all invoices (paid, unpaid, pending) all in one view"
            :columns="[
                ['key' => 'id', 'label' => 'Invoice ID', 'prefix' => '#'],
                ['key' => 'client_name', 'label' => 'Client'],
                ['key' => 'amount', 'label' => 'Amount', 'prefix' => '$'],
                ['key' => 'due_date', 'label' => 'Due Date'],
                ['key' => 'status', 'label' => 'Status'],
                ['key' => 'action', 'label' => 'Action']
            ]"
            :data-route="route('get.invoices')"
        />
        </div>
    </main>
@endsection

@push('extra-js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
@endpush
