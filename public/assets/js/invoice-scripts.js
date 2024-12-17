// public/js/invoice-scripts.js

document.addEventListener('DOMContentLoaded', function () {
    function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
    }

    const preloaderVisibleBg = document.getElementById('preloaderVisibleBg');

    let itemCounter = 0;

    function addInvoiceItem() {
        itemCounter++;
        const itemHtml = `
            <div class="invoice-item mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="items[${itemCounter}][description]" placeholder="Item description" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control item-amount" name="items[${itemCounter}][amount]" placeholder="Amount" step="0.01" required>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-outline-danger btn-sm remove-item">Remove</button>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('invoiceItems').insertAdjacentHTML('beforeend', itemHtml);
    }

    function updateTotalAmount() {
        const amounts = Array.from(document.querySelectorAll('.item-amount')).map(input => parseFloat(input.value) || 0);
        const total = amounts.reduce((sum, amount) => sum + amount, 0);
        document.getElementById('totalAmount').textContent = total.toFixed(2);
    }

    document.getElementById('addItemBtn').addEventListener('click', addInvoiceItem);

    document.getElementById('invoiceItems').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.invoice-item').remove();
            updateTotalAmount();
        }
    });

    document.getElementById('invoiceItems').addEventListener('input', function (e) {
        if (e.target.classList.contains('item-amount')) {
            updateTotalAmount();
        }
    });

    


    function populateClientDropdown() {
        const select = document.getElementById('clientSelect');
        
        // Clear existing options except first (placeholder)
        while (select.options.length > 1) {
            select.remove(1);
        }
        
        // Add change event listener to handle "Add new client" option
        select.addEventListener('change', function(e) {
            if (e.target.value === 'add-new') {
                // Reset the select back to placeholder
                e.target.value = '';
                
                // Show the client modal
                wasInvoiceModalOpen = true;
                $('#createInvoiceModal').modal('hide');
                $('#createClientModal').modal('show');
            }
        });
        
        // Fetch clients and add them
        fetch('/dashboard/stripe/customers', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': getCsrfToken(),
                'Accept': 'application/json',
            }
        })
            .then(response => response.json())
            .then(data => {
                data.forEach(client => {
                    const option = document.createElement('option');
                    option.value = client.stripe_customer_id;
                    option.textContent = `${client.name || ''} - ${client.email}`;
                    select.appendChild(option);
                });

                // Add the "Add new client" option after all clients
                const addNewOption = document.createElement('option');
                addNewOption.value = 'add-new';
                addNewOption.textContent = '+ Add new client';
                addNewOption.className = 'text-primary fw-medium border-top';
                select.appendChild(addNewOption);
            })
            .catch(error => {
                console.error('Error fetching clients:', error);
            });
    }

    function handleInvoiceSubmission(e) {
        e.preventDefault();
        const formData = new FormData(this);
        preloaderVisibleBg.style.display = 'flex';
        


        fetch('/dashboard/stripe/create-invoice', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': getCsrfToken(),
            }
        })
            .then(response => response.json())
            .then(data => {
                preloaderVisibleBg.style.display = 'none';

                if (data.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Invoice created successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#createInvoiceModal').modal('hide');
                            // Optionally, refresh the invoice list or update the UI
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Error creating invoice: ' + data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while creating the invoice.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    }



    function handleClientSubmission(e) {
        e.preventDefault();
        preloaderVisibleBg.style.display = 'flex';

        const formData = new FormData(this);

        fetch('/dashboard/stripe/create-customer', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': getCsrfToken(),
            }
        })
            .then(response => response.json())
            .then(data => {
                preloaderVisibleBg.style.display = 'none';

                if (data.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Client added successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#createClientModal').modal('hide');
                            populateClientDropdown();
                            // Select the newly created client in the dropdown
                            const clientSelect = document.getElementById('clientSelect');
                            if (clientSelect) {
                                clientSelect.value = data.customer.id;
                            }
                            if (wasInvoiceModalOpen) {
                                $('#createInvoiceModal').modal('show');
                                wasInvoiceModalOpen = false;
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Error adding client: ' + data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while adding the client.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    }

    // Attach event listeners
    const createInvoiceForm = document.getElementById('createInvoiceForm');
    if (createInvoiceForm) {
        createInvoiceForm.addEventListener('submit', handleInvoiceSubmission);
    }

    const createClientForm = document.getElementById('createClientForm');
    if (createClientForm) {
        createClientForm.addEventListener('submit', handleClientSubmission);
    }

    const addNewClientBtns = document.getElementsByClassName('addNewClientBtn');
    Array.from(addNewClientBtns).forEach(btn => {
        btn.addEventListener('click', function () {
            wasInvoiceModalOpen = $('#createInvoiceModal').hasClass('show');
            $('#createInvoiceModal').modal('hide');
            $('#createClientModal').modal('show');
        });
    });

    // Populate client dropdown when invoice modal is shown
    const createInvoiceModal = document.getElementById('createInvoiceModal');
    if (createInvoiceModal) {
        createInvoiceModal.addEventListener('show.bs.modal', populateClientDropdown);
    }

    // When client modal is hidden, show invoice modal again if it was previously open
    const createClientModal = document.getElementById('createClientModal');
    if (createClientModal) {
        createClientModal.addEventListener('hidden.bs.modal', function () {
            if (wasInvoiceModalOpen) {
                $('#createInvoiceModal').modal('show');
                wasInvoiceModalOpen = false;
            }
        });
    }
});