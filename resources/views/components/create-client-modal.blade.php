@if (auth()->user()->hasCompletedStripeOnboarding())
    <div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-sm">
                <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo" class="modal-logo"
                            width="80" height="45">
                        <div>
                            <h5 class="modal-title fs-6 fw-bold mb-0" id="createClientModalLabel">Add New Client</h5>
                            <p class="text-muted small mb-0">Fill out the form below to add a new client</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close small" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="createClientForm">
                        @csrf
                        <div class="mb-3">
                            <label for="clientName" class="form-label small mb-2">Full Name</label>
                            <input type="text" class="form-control form-control-sm shadow-none" 
                                id="clientName" name="name" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-4">
                            <label for="clientEmail" class="form-label small mb-2">Email</label>
                            <input type="email" class="form-control form-control-sm shadow-none" 
                                id="clientEmail" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add Client</button>
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

        .modal-logo {
            border-radius: 12px;
            padding: 8px;
            background: #f8f9fa;
        }

        .form-control {
            border-radius: 8px;
            border-color: #E5E7EB;
            font-size: 14px;
            padding: 0.5rem 0.75rem;
        }

        .form-control:focus {
            border-color: #3B82F6;
            box-shadow: none;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 10px;
            background: #0D6EFD;
            border: none;
        }

        .btn-close {
            background-size: 0.8em;
        }
    </style>
@endif
