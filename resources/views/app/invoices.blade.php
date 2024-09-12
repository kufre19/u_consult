@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Invoices</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Invoices List</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group"  data-bs-toggle="modal" data-bs-target="#createInvoiceModal">
                        <button type="button" class="btn btn-outline-primary">New Invoice</button>
                    </div>
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
@include('components.create-invoice-modal')
@include('components.create-client-modal')

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