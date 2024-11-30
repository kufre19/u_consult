@extends('layouts.app')

@section('main-content')
    <main class="main-wrapper">
        <div class="main-content">
            <x-page-header 
                title="Transactions"
                :breadcrumbs="[
                    ['label' => 'Dashboard', 'url' => route('dashboard')],
                    ['label' => 'Transactions']
                ]"
            >
                <div class="action-button">
                    <!-- Add any transaction-specific actions here -->
                </div>
            </x-page-header>

            <x-data-table 
                title="All Transactions"
                description="Overview of all your payment transactions"
                :columns="[
                    ['key' => 'id', 'label' => 'Transaction ID'],
                    ['key' => 'amount', 'label' => 'Amount', 'prefix' => '$'],
                    ['key' => 'type', 'label' => 'Type'],
                    ['key' => 'status', 'label' => 'Status'],
                    ['key' => 'created_at', 'label' => 'Date'],
                    ['key' => 'action', 'label' => 'Action']
                ]"
                :data-route="route('get.transactions')"
                :filters="true"
            />
        </div>
    </main>
@endsection