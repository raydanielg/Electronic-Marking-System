@extends('layouts.dashboard')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title">Students Management</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Dashboard</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <span>Students</span>
        </div>
    </div>
    <div class="btn-group">
        <a href="{{ route('students.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Add Student
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('students.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <label class="form-label small fw-bold">Search</label>
                <div class="input-group">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Name, PREM, or Admission No." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold">School</label>
                <select name="school_id" class="form-select form-select-sm">
                    <option value="">All Schools</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ request('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-bold">Sex</label>
                <select name="sex" class="form-select form-select-sm">
                    <option value="">All</option>
                    <option value="Male" {{ request('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ request('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-bold">Status</label>
                <select name="status" class="form-select form-select-sm">
                    <option value="">All</option>
                    <option value="Not Admitted" {{ request('status') == 'Not Admitted' ? 'selected' : '' }}>Not Admitted</option>
                    <option value="Admitted" {{ request('status') == 'Admitted' ? 'selected' : '' }}>Admitted</option>
                    <option value="Graduated" {{ request('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary btn-sm w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 custom-table">
            <thead>
                <tr>
                    <th class="ps-3">Prem Number</th>
                    <th>Full Name</th>
                    <th>School</th>
                    <th>Sex</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td class="ps-3 text-dark small">{{ $student->prem_number ?: 'N/A' }}</td>
                    <td class="fw-medium text-dark text-uppercase small">{{ $student->full_name }}</td>
                    <td class="text-secondary small">{{ $student->school->name }}</td>
                    <td class="text-secondary small">{{ $student->sex }}</td>
                    <td>
                        @if($student->status === 'Admitted')
                            <span class="status-badge status-active">
                                <i class="fas fa-check-circle me-1"></i> {{ $student->status }}
                            </span>
                        @else
                            <span class="status-badge status-inactive">
                                <i class="fas fa-exclamation-triangle me-1"></i> {{ $student->status }}
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="action-icons">
                            <button type="button" class="action-btn text-info" onclick="showStudentDetails({{ $student->id }})" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <a href="{{ route('students.edit', $student->id) }}" class="action-btn text-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this student?')">
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
                    <td colspan="6" class="text-center py-5 text-muted">
                        No students found matching your criteria.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($students->hasPages())
    <div class="card-footer bg-white border-top-0 py-3">
        {{ $students->links() }}
    </div>
    @endif
</div>

<style>
.custom-table thead th {
    background-color: #f8f9fa;
    color: #0d6efd;
    font-weight: 600;
    padding-top: 12px;
    padding-bottom: 12px;
    border-bottom: 2px solid #dee2e6;
    font-size: 0.85rem;
}
.custom-table tbody td {
    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #f1f1f1;
}
.custom-table tbody tr:nth-child(even) { background-color: #fafafa; }

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 700;
}
.status-active { background-color: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
.status-inactive { background-color: #ffc107; color: #000; border: 1px solid #e0a800; }

.action-icons { display: flex; justify-content: center; gap: 6px; }
.action-btn { background: none; border: none; padding: 2px; font-size: 0.85rem; transition: opacity 0.2s; }
.action-btn:hover { opacity: 0.7; }
</style>

<!-- Student Details Modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg text-center">
            <div class="modal-header py-3 border-0 justify-content-center bg-light">
                <h5 class="modal-title fw-bold text-primary text-uppercase">STUDENT INFORMATION</h5>
            </div>
            <div class="modal-body p-4" id="studentDetailsBody">
                <!-- Data loaded via JS -->
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-secondary px-4 btn-sm" data-bs-dismiss="modal">Close</button>
                <a href="#" id="editStudentBtn" class="btn btn-primary px-4 btn-sm">Edit Details</a>
            </div>
        </div>
    </div>
</div>

<script>
function showStudentDetails(studentId) {
    const modal = new bootstrap.Modal(document.getElementById('studentDetailsModal'));
    const body = document.getElementById('studentDetailsBody');
    const editBtn = document.getElementById('editStudentBtn');
    
    body.innerHTML = '<div class="py-5"><div class="spinner-border text-primary" role="status"></div></div>';
    modal.show();
    
    fetch('/students/' + studentId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const s = data.student;
                body.innerHTML = `
                    <div class="mb-4">
                        <h4 class="fw-bold text-dark mb-1">${s.full_name.toUpperCase()}</h4>
                        <div class="text-muted small">PREM: <span class="fw-bold text-primary">${s.prem_number || 'N/A'}</span></div>
                    </div>
                    <hr class="my-3 mx-auto w-75">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="text-muted small text-uppercase fw-bold">Academic Info</div>
                            <div>School: <strong>${s.school.name}</strong></div>
                            <div>Admission No: <strong>${s.admission_number || 'N/A'}</strong></div>
                            <div class="mt-2">
                                <span class="status-badge ${s.status === 'Admitted' ? 'status-active' : 'status-inactive'}">
                                    ${s.status.toUpperCase()}
                                </span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="text-muted small text-uppercase fw-bold">Personal & Parent</div>
                            <div>Sex: <strong>${s.sex}</strong> | DOB: <strong>${s.date_of_birth || 'N/A'}</strong></div>
                            <div class="mt-1">Parent: <strong>${s.parent_name || 'N/A'}</strong></div>
                            <div>Phone: <strong>${s.parent_phone || 'N/A'}</strong></div>
                        </div>
                    </div>
                `;
                editBtn.href = '/students/' + studentId + '/edit';
            }
        });
}
</script>
@endsection
