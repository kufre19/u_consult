@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <x-page-header 
                title="Clients"
                :breadcrumbs="[
                    ['label' => 'Dashboard', 'url' => route('dashboard')],
                    ['label' => 'Clients']
                ]"
            >
                <div class="action-button">
                    @if (auth()->user()->hasCompletedStripeOnboarding())
                        <button type="button" class="btn btn-alt-primary addNewClientBtn">
                            <i class="fa fa-plus"></i> Add New Client
                        </button>
                    @else
                        <a href="{{ route('stripe.onboarding') }}" class="btn btn-alt-primary">
                            Verify Account
                        </a>
                    @endif
                </div>
            </x-page-header>

            <x-data-table 
                title="Client List"
                description="Manage all your clients in one place"
                :columns="[
                    ['key' => 'name', 'label' => 'Client Name'],
                    ['key' => 'email', 'label' => 'Email'],
                    ['key' => 'phone', 'label' => 'Phone'],
                    ['key' => 'status', 'label' => 'Status'],
                    ['key' => 'created_at', 'label' => 'Added On'],
                    ['key' => 'action', 'label' => 'Actions']
                ]"
                :data-route="route('get.clients')"
                :filters="false"
            />
        </div>
    </main>
@endsection

@push('extra-js')
<script>
    function viewDetails(id) {
        // Handle client details view
        window.location.href = `/clients/${id}`;
    }
</script>
@endpush
