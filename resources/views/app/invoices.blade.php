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
                    @if(auth()->user()->hasCompletedStripeOnboarding())
                        <button type="button" class="btn btn-alt-primary"  data-bs-toggle="modal" data-bs-target="#createInvoiceModal">New Invoice</button>
                    @else
                        <a href="{{ route('stripe.onboarding') }}" class="btn btn-alt-primary">Verify Account</a>
                    @endif
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="invoicesTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Client Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Invoice Url</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('extra-js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#invoicesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get.invoices') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'client_name', name: 'client_name'},
                {data: 'amount', name: 'amount'},
                {data: 'status', name: 'status'},
                {data: 'invoice_url', name: 'invoice_url', orderable: false, searchable: false},
                {data: 'created_at', name: 'created_at'}
            ]
        });
    });
</script>
@endpush