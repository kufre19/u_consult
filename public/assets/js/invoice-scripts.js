// public/js/invoice-scripts.js

document.addEventListener('DOMContentLoaded', function() {
    // Populate client dropdown from Stripe
    function populateClientDropdown() {

        fetch('/dashboard/stripe/customers', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            const clientSelect = document.getElementById('clientSelect');
            clientSelect.innerHTML = '<option value="">Choose...</option>'; // Reset options
            console.log(data);
            data.forEach(customer => {
                const option = document.createElement('option');
                option.value = customer.id;
                option.textContent = customer.name || customer.email || customer.id;
                clientSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching Stripe customers:', error));
    }

    // Handle form submission
    function handleInvoiceSubmission(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch('/dashboard/stripe/create-invoice', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Invoice created successfully!');
                $('#createInvoiceModal').modal('hide');
                // Optionally, refresh the invoice list or update the UI
            } else {
                alert('Error creating invoice: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while creating the invoice.');
        });
    }

    // Attach event listeners
    const createInvoiceForm = document.getElementById('createInvoiceForm');
    if (createInvoiceForm) {
        createInvoiceForm.addEventListener('submit', handleInvoiceSubmission);
    }

    // Populate client dropdown when modal is shown
    $('#createInvoiceModal').on('show.bs.modal', populateClientDropdown);
});