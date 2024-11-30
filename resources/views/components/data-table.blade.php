@push('extra-css')
<style>
/* Custom Tabs */
.custom-tabs {
    border: none;
    gap: 10px;
}

.custom-tabs .nav-link {
    border: none;
    padding: 8px 16px;
    color: #64748b;
    border-radius: 8px;
    font-weight: 500;
}

.custom-tabs .nav-link.active {
    background-color: #f1f5f9;
    color: #0ea5e9;
}

/* Search Input */
.search-wrapper {
    position: relative;
}

#searchInput {
    padding-left: 40px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

/* Custom Table */
.custom-table {
    border-collapse: separate;
    border-spacing: 0 8px;
}

.custom-table thead th {
    border: none;
    color: #64748b;
    font-weight: 500;
    padding: 12px 16px;
}

.custom-table tbody tr {
    background: white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border-radius: 8px;
    transition: all 0.2s;
}

.custom-table tbody tr:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.custom-table tbody td {
    padding: 16px;
    border: none;
    vertical-align: middle;
}

/* Status Badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 500;
    font-size: 14px;
}

.status-paid { background: #dcfce7; color: #16a34a; }
.status-awaiting { background: #fef9c3; color: #ca8a04; }
.status-overdue { background: #fee2e2; color: #dc2626; }
</style>
@endpush

@props([
    'title' => '',
    'description' => '',
    'columns' => [],
    'dataRoute' => null,
    'filters' => true,
])

@if(!$dataRoute)
    <div class="alert alert-danger">
        Data route is required for the table component
    </div>
@else
    <div class="card">
        <div class="card-body">
            @if($title || $description)
            <div class="d-flex flex-column mb-4">
                <h3 class="mb-2">{{ $title }}</h3>
                <p class="text-muted">{{ $description }}</p>
            </div>
            @endif

            @if($filters)
            <div class="d-flex justify-content-between align-items-center mb-4">
                <ul class="nav custom-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-filter="all">All</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-filter="paid">Paid</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-filter="awaiting">Awaiting</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-filter="overdue">Overdue</button>
                    </li>
                </ul>
                
                <div class="d-flex gap-2">
                    <div class="search-wrapper">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search details">
                    </div>
                    <button class="btn btn-outline-primary">Default filter</button>
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            @foreach($columns as $column)
                                <th>{{ $column['label'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

@push('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let tableData = [];
    
    // Fetch data
    fetch('{!! $dataRoute !!}')
        .then(response => response.json())
        .then(data => {
            tableData = data;
            renderTableData(tableData);
        });

    // Filter buttons
    if (document.querySelector('.custom-tabs')) {
        document.querySelectorAll('.custom-tabs .nav-link').forEach(button => {
            button.addEventListener('click', (e) => {
                document.querySelectorAll('.custom-tabs .nav-link').forEach(btn => 
                    btn.classList.remove('active'));
                
                e.target.classList.add('active');
                
                const filter = e.target.dataset.filter;
                const filtered = filter === 'all' 
                    ? tableData 
                    : tableData.filter(t => t.status.toLowerCase() === filter);
                
                renderTableData(filtered);
            });
        });
    }

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const filtered = tableData.filter(item => 
                Object.values(item).some(val => 
                    val?.toString().toLowerCase().includes(searchTerm)
                )
            );
            renderTableData(filtered);
        });
    }

    // Render table data
    function renderTableData(data) {
        const tbody = document.getElementById('tableBody');
        tbody.innerHTML = '';

        data.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = formatRowData(item);
            tbody.appendChild(tr);
        });
    }

    function formatRowData(item) {
        const columns = @json($columns);
        return columns.map(column => {
            const value = item[column.key];
            
            if (column.key === 'status') {
                return `<td>
                    <span class="status-badge status-${value.toLowerCase()}">
                        ${value}
                    </span>
                </td>`;
            }
            
            if (column.key === 'action') {
                return `<td>
                    <button class="btn btn-link" onclick="viewDetails('${item.id}')">
                        View details
                    </button>
                </td>`;
            }
            
            return `<td>${column.prefix || ''}${value}${column.suffix || ''}</td>`;
        }).join('');
    }
});

function viewDetails(id) {
    window.location.href = `/invoices/${id}`;
}
</script>
@endpush
