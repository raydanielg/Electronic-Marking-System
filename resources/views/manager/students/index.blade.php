@extends('layouts.dashboard')

@section('content')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark fw-bold">Students</h1>
        <small class="text-muted">Active School: <span class="fw-bold text-success">MJI MWEMA SECONDARY SCHOOL</span></small>
    </div>
</div>

<div class="card border-0 shadow-sm mb-3 bg-light bg-opacity-50">
    <div class="card-body py-2">
        <form action="{{ route('students.index') }}" method="GET" class="row g-2 align-items-center justify-content-end">
            <div class="col-auto">
                <label class="small fw-bold mb-0">Exam Centre</label>
            </div>
            <div class="col-md-2">
                <select name="school_id" class="form-select form-select-sm border-success-subtle">
                    <option value="">All Centres</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ request('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto ms-2">
                <label class="small fw-bold mb-0">Show</label>
            </div>
            <div class="col-auto">
                <select name="per_page" class="form-select form-select-sm border-success-subtle">
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                </select>
            </div>
            <div class="col-auto ms-2">
                <label class="small fw-bold mb-0">Search:</label>
            </div>
            <div class="col-md-2">
                <input type="text" name="search" class="form-control form-control-sm border-success-subtle" value="{{ request('search') }}" placeholder="Enter search term...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success btn-sm px-3 fw-bold shadow-sm">Apply</button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mb-3">
    <div class="dropdown">
        <button class="btn btn-outline-success btn-sm dropdown-toggle shadow-sm" type="button" data-bs-toggle="dropdown">
            <i class="fas fa-columns me-1"></i> Columns
        </button>
        <ul class="dropdown-menu shadow-sm p-2" id="columnToggle">
            <li><label class="dropdown-item small py-1"><input type="checkbox" checked data-column="0" class="me-2 col-toggle"> Exam Number</label></li>
            <li><label class="dropdown-item small py-1"><input type="checkbox" checked data-column="1" class="me-2 col-toggle"> Cert. Entry Number</label></li>
            <li><label class="dropdown-item small py-1"><input type="checkbox" checked data-column="2" class="me-2 col-toggle"> Full Name</label></li>
            <li><label class="dropdown-item small py-1"><input type="checkbox" checked data-column="3" class="me-2 col-toggle"> Sex</label></li>
            <li><label class="dropdown-item small py-1"><input type="checkbox" checked data-column="4" class="me-2 col-toggle"> Status</label></li>
        </ul>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm fw-bold">
        <i class="fas fa-user-plus me-1"></i> Add Student
    </a>
    <a href="{{ route('students.import-page') }}" class="btn btn-warning btn-sm px-3 shadow-sm text-dark fw-bold">
        <i class="fas fa-file-import me-1"></i> Import
    </a>
    <button class="btn btn-success btn-sm px-3 shadow-sm fw-bold">
        <i class="fas fa-print me-1"></i> Print Out
    </button>
    <button class="btn btn-secondary btn-sm px-3 shadow-sm fw-bold">
        Re-assign Numbers
    </button>
</div>

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success btn-sm px-4 shadow-sm fw-bold">
        Assign Numbers
    </button>
</div>

<div class="card border-0 shadow-sm overflow-hidden rounded-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 custom-ui-table" id="studentsTable">
            <thead>
                <tr>
                    <th class="ps-3">Exam Number</th>
                    <th>Cert. Entry Number</th>
                    <th>Full Name</th>
                    <th>Sex</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                <!-- In-table filters -->
                <tr class="bg-light filter-row">
                    <td class="ps-3"><input type="text" class="form-control form-control-sm table-filter" data-col="0" placeholder="Filter Exam No."></td>
                    <td><input type="text" class="form-control form-control-sm table-filter" data-col="1" placeholder="Filter Cert No."></td>
                    <td><input type="text" class="form-control form-control-sm table-filter" data-col="2" placeholder="Filter Name"></td>
                    <td>
                        <select class="form-select form-select-sm table-filter" data-col="3">
                            <option value="">All</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select form-select-sm table-filter" data-col="4">
                            <option value="">All</option>
                            <option value="ADMITTED">ADMITTED</option>
                            <option value="NOT ADMITTED">NOT ADMITTED</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td class="ps-3 text-dark small fw-bold">{{ $student->prem_number ?: '---' }}</td>
                    <td class="text-dark small">{{ $student->cert_entry_number ?: '---' }}</td>
                    <td class="fw-medium text-dark text-uppercase small">{{ $student->full_name }}</td>
                    <td class="text-dark small">{{ $student->sex }}</td>
                    <td>
                        <span class="status-pill {{ $student->status === 'Admitted' ? 'pill-active' : 'pill-warning' }}">
                            @if($student->status !== 'Admitted') <i class="fas fa-exclamation-triangle me-1"></i> @endif
                            {{ strtoupper($student->status) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="row-action-icons">
                            <i class="fas fa-check-square text-success" title="Validate"></i>
                            <i class="fas fa-wheelchair text-success" title="Disability"></i>
                            <i class="fas fa-file-alt text-success" title="Report"></i>
                            <i class="fas fa-exchange-alt text-success" title="Transfer"></i>
                            <i class="fas fa-eraser text-success" title="Reset"></i>
                            <i class="fas fa-eye text-success cursor-pointer" onclick="showStudentDetails({{ $student->id }})" title="View"></i>
                            <a href="{{ route('students.edit', $student->id) }}" class="text-success"><i class="fas fa-edit" title="Edit"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        No students found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($students instanceof \Illuminate\Pagination\LengthAwarePaginator && $students->hasPages())
    <div class="card-footer bg-white border-top-0 py-3">
        {{ $students->links() }}
    </div>
    @endif
</div>

<style>
.custom-ui-table thead th {
    background-color: #f8f9fa;
    color: #198754; /* Green headers */
    font-weight: 700;
    padding: 12px 8px;
    border-bottom: 2px solid #dee2e6;
    font-size: 0.85rem;
}
.custom-ui-table tbody td {
    padding: 10px 8px;
    font-size: 0.85rem;
    border-bottom: 1px solid #f1f1f1;
}
.custom-ui-table tbody tr:nth-child(even) { background-color: #fafafa; }

.status-pill {
    display: inline-flex;
    align-items: center;
    padding: 2px 10px;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 800;
}
.pill-active { background-color: #e8f5e9; color: #198754; border: 1px solid #c8e6c9; }
.pill-warning { background-color: #ffc107; color: #000; border: 1px solid #e0a800; }

.row-action-icons {
    display: flex;
    justify-content: center;
    gap: 12px;
    font-size: 0.9rem;
}
.row-action-icons i { cursor: pointer; transition: transform 0.1s; }
.row-action-icons i:hover { transform: scale(1.2); }

.filter-row td { padding: 5px 8px !important; }
.table-filter { font-size: 0.75rem !important; height: 28px !important; padding: 2px 5px !important; }
</style>

<script>
// Column Toggle Logic (Client-side)
document.querySelectorAll('.col-toggle').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const colIdx = this.dataset.column;
        const table = document.getElementById('studentsTable');
        const rows = table.rows;
        
        for (let i = 0; i < rows.length; i++) {
            const cell = rows[i].cells[colIdx];
            if (cell) {
                cell.style.display = this.checked ? '' : 'none';
            }
        }
    });
});

// Simple Table Filter Logic
document.querySelectorAll('.table-filter').forEach(input => {
    input.addEventListener('keyup', filterTable);
    input.addEventListener('change', filterTable);
});

function filterTable() {
    const table = document.getElementById('studentsTable');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    const filters = Array.from(document.querySelectorAll('.table-filter'));
    
    rows.forEach(row => {
        let show = true;
        filters.forEach(filter => {
            const colIdx = filter.dataset.col;
            const text = row.cells[colIdx].textContent.toLowerCase();
            const val = filter.value.toLowerCase();
            if (val && !text.includes(val)) show = false;
        });
        row.style.display = show ? '' : 'none';
    });
}

function showStudentDetails(studentId) {
    const modal = new bootstrap.Modal(document.getElementById('studentDetailsModal'));
    const body = document.getElementById('studentDetailsBody');
    const editBtn = document.getElementById('editStudentBtn');
    
    body.innerHTML = '<div class="py-5"><div class="spinner-border text-success" role="status"></div></div>';
    modal.show();
    
    fetch('/students/' + studentId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const s = data.student;
                body.innerHTML = `
                    <div class="mb-4">
                        <h4 class="fw-bold text-dark mb-1 text-success">${s.full_name.toUpperCase()}</h4>
                        <div class="text-muted small">Examination No: <span class="fw-bold text-success">${s.prem_number || 'N/A'}</span></div>
                    </div>
                    <hr class="my-3 mx-auto w-75">
                    <div class="row g-3">
                        <div class="col-12 text-center text-dark">
                            <div>School: <strong class="text-success">${s.school.name}</strong></div>
                            <div>Admission No: <strong>${s.admission_number || 'N/A'}</strong></div>
                            <div class="mt-2">
                                <span class="status-pill ${s.status === 'Admitted' ? 'pill-active' : 'pill-warning'}">
                                    ${s.status.toUpperCase()}
                                </span>
                            </div>
                        </div>
                    </div>
                `;
                editBtn.href = '/students/' + studentId + '/edit';
            }
        });
}
</script>
@endsection

