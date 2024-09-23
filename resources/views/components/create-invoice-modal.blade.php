<div class="modal fade" id="createInvoiceModal" tabindex="-1" aria-labelledby="createInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title text-white" id="createInvoiceModalLabel">Create New Invoice</h5>
                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <form id="createInvoiceForm" class="row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label for="clientSelect" class="form-label">Client</label>
                            <select id="clientSelect" name="client_id" class="form-select" required>
                                <option value="">Choose...</option>
                            </select>
                            <button type="button" class="btn btn-outline-secondary mt-1 btn-sm addNewClientBtn" >
                                Add New Client
                            </button>
                        </div>
                        <div class="col-md-6">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="dueDate" name="due_date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="currency" class="form-label">Currency</label>
                            <select id="currency" name="currency" class="form-select" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="GBP">GBP</option>
                                <option value="NGN">NGN</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <h6>Invoice Items</h6>
                            <div id="invoiceItems">
                                <!-- Invoice items will be added here dynamically -->
                            </div>
                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" id="addItemBtn">
                                Add Item
                            </button>
                        </div>
                        <div class="col-md-12">
                            <h6>Total Amount: <span id="totalAmount">0.00</span></h6>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-grd-primary">Create Invoice</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>