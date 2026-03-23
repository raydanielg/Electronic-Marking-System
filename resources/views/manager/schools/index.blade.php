@extends('layouts.dashboard')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title">Schools Management</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Dashboard</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <span>Schools</span>
        </div>
    </div>
    <div class="btn-group">
        <a href="{{ route('schools.import-page') }}" class="btn btn-outline-primary shadow-sm">
            <i class="fas fa-file-import me-1"></i> Import
        </a>
        <a href="{{ route('schools.create') }}" class="btn btn-primary shadow-sm ms-2">
            <i class="fas fa-plus me-1"></i> Add School
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0 fw-bold">List of Schools</h6>
        <form action="{{ route('schools.index') }}" method="GET" class="input-group" style="max-width: 300px;">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search schools..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 custom-table">
            <thead>
                <tr>
                    <th class="ps-3">Reg. Number</th>
                    <th>School Name</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Region</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schools as $school)
                <tr>
                    <td class="ps-3">
                        <span class="text-dark">{{ $school->registration_number }}</span>
                    </td>
                    <td class="fw-medium text-dark">{{ strtoupper($school->name) }}</td>
                    <td class="text-secondary">{{ $school->category }}</td>
                    <td class="text-secondary">{{ $school->type }}</td>
                    <td class="text-secondary">{{ $school->region }}</td>
                    <td>
                        @if($school->is_active)
                            <span class="status-badge status-active">
                                <i class="fas fa-check-circle me-1"></i> Active
                            </span>
                        @else
                            <span class="status-badge status-inactive">
                                <i class="fas fa-exclamation-triangle me-1"></i> Inactive
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="action-icons">
                            <button type="button" class="action-btn text-info" onclick="showSchoolDetails({{ $school->id }})" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <a href="{{ route('schools.edit', $school->id) }}" class="action-btn text-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('schools.destroy', $school->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this school?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn text-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        No schools found matching your search.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($schools->hasPages())
    <div class="card-footer bg-white border-top-0 py-3">
        {{ $schools->links() }}
    </div>
    @endif
</div>

<style>
/* Custom Table Styling to match image */
.custom-table thead th {
    background-color: #f8f9fa;
    color: #0d6efd; /* Blue headers */
    font-weight: 600;
    text-transform: none;
    padding-top: 12px;
    padding-bottom: 12px;
    border-bottom: 2px solid #dee2e6;
    font-size: 0.9rem;
}
.custom-table tbody td {
    padding-top: 12px;
    padding-bottom: 12px;
    font-size: 0.88rem;
    border-bottom: 1px solid #f1f1f1;
}
.custom-table tbody tr:nth-child(even) {
    background-color: #fafafa;
}

/* Status Badge - matching image style */
.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 2px 10px;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 700;
}
.status-active {
    background-color: #e8f5e9;
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}
.status-inactive {
    background-color: #ffc107; /* Yellow as in image */
    color: #000;
    border: 1px solid #e0a800;
}

/* Action Icons Styling */
.action-icons {
    display: flex;
    justify-content: center;
    gap: 8px;
}
.action-btn {
    background: none;
    border: none;
    padding: 4px;
    font-size: 0.9rem;
    transition: opacity 0.2s;
    text-decoration: none;
}
.action-btn:hover {
    opacity: 0.7;
}
</style>

<!-- School Details Modal -->
<div class="modal fade" id="schoolDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header py-3 border-0 justify-content-center bg-light">
                <h5 class="modal-title fw-bold text-primary text-uppercase" id="modalTitle">SCHOOL INFORMATION</h5>
            </div>
            <div class="modal-body p-4 text-center" id="schoolDetailsBody">
                <div class="py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                <a href="#" id="editSchoolBtn" class="btn btn-primary px-4">Edit Details</a>
            </div>
        </div>
    </div>
</div>

<script>
function showSchoolDetails(schoolId) {
    const modal = new bootstrap.Modal(document.getElementById('schoolDetailsModal'));
    const body = document.getElementById('schoolDetailsBody');
    const editBtn = document.getElementById('editSchoolBtn');
    
    body.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div><div class="mt-2 text-muted small">Loading details...</div></div>';
    modal.show();
    
    fetch('/schools/' + schoolId + '/details')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const s = data.school;
                body.innerHTML = `
                    <div class="mb-4 mt-2">
                        <h4 class="fw-bold text-dark mb-1">${s.name.toUpperCase()}</h4>
                        <div class="text-muted small">Registration: <span class="fw-bold text-primary">${s.registration_number}</span></div>
                    </div>
                    
                    <hr class="my-4 mx-auto w-75">
                    
                    <div class="row g-3 justify-content-center">
                        <div class="col-12 mb-2">
                            <div class="text-muted small text-uppercase fw-bold">Basic Information</div>
                            <div class="text-dark">Category: <strong>${s.category}</strong></div>
                            <div class="text-dark">Type: <strong>${s.type}</strong></div>
                            <div class="mt-2">
                                <span class="status-badge ${s.is_active ? 'status-active' : 'status-inactive'}">
                                    ${s.is_active ? 'ACTIVE' : 'INACTIVE'}
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-12 mb-2 mt-4">
                            <div class="text-muted small text-uppercase fw-bold">Location</div>
                            <div class="text-dark">${s.region} - ${s.district}</div>
                            <div class="text-muted small">${s.ward || ''} ${s.address || ''}</div>
                        </div>
                        
                        <div class="col-12 mt-4">
                            <div class="text-muted small text-uppercase fw-bold">Management & Contact</div>
                            <div class="text-primary fw-bold h6 mb-1">${s.headmaster_name || 'Not Specified'}</div>
                            <div class="text-dark small">${s.email || 'No Email'} | ${s.phone || 'No Phone'}</div>
                        </div>
                    </div>
                `;
                editBtn.href = '/schools/' + schoolId + '/edit';
            }
        });
}
</script>
@endsection
