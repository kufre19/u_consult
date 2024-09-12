
<div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title" id="createClientModalLabel">Add New Client</h5>
                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <form id="createClientForm" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <label for="clientName" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="clientName" name="name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="clientEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="clientEmail" name="email" required>
                    </div>
                    <div class="col-md-12">
                        <label for="clientPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="clientPhone" name="phone">
                    </div>
                    <div class="col-md-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-grd-primary">Add Client</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>