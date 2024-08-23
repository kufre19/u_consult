@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        @if(auth()->user()->hasCompletedStripeOnboarding())
                            <button type="button" class="btn btn-outline-primary">New Invoice</button>
                        @else
                            <a href="{{ route('stripe.onboarding') }}" class="btn btn-outline-primary">Complete Stripe Onboarding</a>
                        @endif
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="row">




                <h6 class="mb-0 text-uppercase">My Invoice </h6>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                                <tbody>



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Client Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Invoice Url</th>
                                        <th>Created On</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
