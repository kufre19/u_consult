@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <div class="breadcrumb-title pe-3">Dashboard</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clients List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="action-button">
                    @if (auth()->user()->hasCompletedStripeOnboarding())
                        <button type="button" class="btn btn-alt-primary addNewClientBtn">Add New Client</button>
                    @else
                        <a href="{{ route('stripe.onboarding') }}" class="btn btn-alt-primary">Verify Account</a>
                    @endif
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="clientsTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
{{-- @include('components.create-client-modal') --}}

@push('extra-js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clientsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get.clients') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
