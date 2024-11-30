@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <x-page-header 
                title="Dashboard"
                :breadcrumbs="[
                    ['label' => 'Home']
                ]"
            >
                <div class="action-button">
                    @if (auth()->user()->hasCompletedStripeOnboarding())
                        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal"
                            data-bs-target="#createInvoiceModal">
                            <i class="fa fa-plus"></i> New Invoice
                        </button>
                    @else
                        <a href="{{ route('stripe.onboarding') }}" class="btn btn-alt-primary">
                            Verify Account
                        </a>
                    @endif
                </div>
            </x-page-header>

            <div class="row">
                {{-- <h6 class="mb-0 text-uppercase">My Invoices</h6>
                <hr> --}}

                <x-data-table 
                    title="Recent Invoices"
                    description="Overview of your latest invoices"
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
        </div>
    </main>
@endsection

{{-- @include('components.create-invoice-modal') --}}
{{-- @include('components.create-client-modal') --}}

@push('extra-js')
    <script>


        function viewDetails(id) {
            window.location.href = `/invoices/${id}`;
        }
    </script>
@endpush
