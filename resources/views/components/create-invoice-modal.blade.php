@if (auth()->user()->hasCompletedStripeOnboarding())
    <div class="modal fade" id="createInvoiceModal" tabindex="-1" aria-labelledby="createInvoiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-sm">
                <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo" class="modal-logo"
                            width="80" height="45">
                        <div>
                            <h5 class="modal-title fs-6 fw-bold mb-0" id="createInvoiceModalLabel">Create Invoice</h5>
                            <p class="text-muted small mb-0">Fill out the form below to generate a professional invoice
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn-close small" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="createInvoiceForm">
                        @csrf
                        <div class="mb-3">
                            <label for="clientSelect" class="form-label small mb-2">Client</label>
                            <select id="clientSelect" name="client_id" class="form-select form-select-sm shadow-none" required>
                                <option value="">Search or add new customer</option>
                                <!-- Clients will be populated here via JS -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dueDate" class="form-label small mb-2">Due Date</label>
                            <input type="date" class="form-control form-control-sm shadow-none" id="dueDate"
                                name="due_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label small mb-2">Note</label>
                            <textarea class="form-control form-control-sm shadow-none" id="note" name="note" rows="3"
                                placeholder="Enter any additional details"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small mb-2">Invoice Item</label>
                            <div id="invoiceItems" class="border-bottom mb-2">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    {{-- <div class="item-details">
                                    <input type="text" class="form-control-plaintext form-control-sm" value="Landing page" readonly>
                                </div> --}}
                                    <div class="amount-details d-flex align-items-center gap-2">
                                        <select class="form-select form-select-sm shadow-none" style="width: auto;"
                                            name="currency">
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="NGN">NGN</option>
                                        </select>
                                        {{-- <input type="number" class="form-control form-control-sm shadow-none" style="width: 100px;" value="1200">
                                    <button type="button" class="btn btn-link text-danger p-0 small">
                                        <i class="material-icons-outlined" style="font-size: 18px;">close</i>
                                    </button> --}}
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-link text-primary p-0 small" id="addItemBtn">
                                <i class="material-icons-outlined align-middle" style="font-size: 18px;"></i>
                                Add item
                            </button>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="text-muted small">Total Amount</span>
                            <span class="fw-bold" id="totalAmount"></span>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create Invoice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-content {
            border: none;
            border-radius: 12px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border-color: #E5E7EB;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3B82F6;
            box-shadow: none;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 10px;
        }

        .material-icons-outlined {
            font-size: 18px;
            vertical-align: middle;
        }

        .modal-header {
            padding: 1.5rem 1.5rem 1rem;
        }

        .modal-logo {
            border-radius: 12px;
            padding: 8px;
            background: #f8f9fa;
        }

        .btn-close {
            background-size: 0.8em;
        }

        #clientSelect option {
            padding: 8px 12px;
        }

        #clientSelect option[value="add-new"] {
            border-top: 1px solid #e5e7eb;
            margin-top: 4px;
            padding-top: 8px;
            color: #3B82F6;
            font-weight: 500;
        }

        .dropdown-menu {
            max-height: 250px;
            overflow-y: auto;
        }

        #clientList {
            margin-bottom: 0;
        }

        #clientList li {
            list-style: none;
        }

        .dropdown-item {
            padding: 8px 16px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
@endif
