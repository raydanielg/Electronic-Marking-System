@extends('layouts.dashboard')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title">Import Students</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Dashboard</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <a href="{{ route('students.index') }}">Students</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <span>Import</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm" id="uploadCard">
            <div class="card-header bg-white py-3">
                <h6 class="card-title mb-0 fw-bold text-success"><i class="fas fa-file-upload me-2"></i>Upload Student Records</h6>
            </div>
            <div class="card-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Select School <span class="text-danger">*</span></label>
                            <select name="school_id" id="school_id" class="form-select border-success-subtle" required>
                                <option value="">-- Select School --</option>
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Education Type <span class="text-danger">*</span></label>
                            <select name="education_type" id="education_type" class="form-select border-success-subtle" required>
                                <option value="">-- Select Type --</option>
                                <option value="Nursery">Nursery</option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Select Class/Level <span class="text-danger">*</span></label>
                            <select name="level_id" id="level_id" class="form-select border-success-subtle" required disabled>
                                <option value="">-- Select Type First --</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label small fw-bold">Excel File (.xlsx, .xls) <span class="text-danger">*</span></label>
                            <input type="file" name="import_file" id="importFile" class="form-control border-success-subtle" accept=".xlsx,.xls" required>
                            <div class="form-text small mt-2">
                                <i class="fas fa-info-circle text-success me-1"></i> Make sure your Excel uses columns: <strong>First Name, Middle Name, Last Name, Sex, Examination Number</strong>.
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 text-end">
                            <button type="submit" class="btn btn-success px-4 shadow-sm">
                                <i class="fas fa-eye me-1"></i> Preview & Verify
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-light border ms-2">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="card border-0 shadow-sm d-none" id="previewCard">
            <div class="card-header bg-success text-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0 fw-bold"><i class="fas fa-list-check me-2"></i>Review & Edit Data</h6>
                <div>
                    <span class="badge bg-white text-success me-2" id="validCount">0 valid</span>
                    <span class="badge bg-warning text-dark" id="invalidCount">0 invalid</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 500px;">
                    <table class="table table-hover align-middle mb-0 custom-table">
                        <thead class="bg-light sticky-top">
                            <tr>
                                <th class="ps-3" style="width: 40px;">#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Sex</th>
                                <th>Exam Number</th>
                                <th>Status</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="previewBody"></tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white py-3 d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-light border btn-sm" id="backBtn">
                    <i class="fas fa-arrow-left me-1"></i> Back to Upload
                </button>
                <div>
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="clearInvalidBtn">
                        <i class="fas fa-trash me-1"></i> Remove Invalid
                    </button>
                    <button type="button" class="btn btn-success btn-sm px-4 shadow-sm" id="confirmImportBtn">
                        <i class="fas fa-check-circle me-1"></i> Confirm Import
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="card-title mb-0 fw-bold text-success"><i class="fas fa-download me-2"></i>Template</h6>
            </div>
            <div class="card-body text-center">
                <p class="text-muted small">Download the latest Excel template for student imports.</p>
                <a href="{{ route('students.download-template') }}" class="btn btn-outline-success btn-sm w-100">
                    <i class="fas fa-file-excel me-1"></i> Download Template
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="card-title mb-0 fw-bold text-secondary"><i class="fas fa-lightbulb me-2"></i>Import Tips</h6>
            </div>
            <div class="card-body">
                <ul class="small text-muted ps-3 mb-0">
                    <li class="mb-2"><strong>Level Selection:</strong> Levels are filtered by Education Type.</li>
                    <li class="mb-2"><strong>Sex:</strong> Must be "Male" or "Female".</li>
                    <li class="mb-2"><strong>Exam Number:</strong> Ensure it's unique across the system.</li>
                    <li><strong>Live Edit:</strong> Click any cell in the preview to fix errors.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.custom-table thead th {
    background-color: #f8f9fa;
    color: #198754;
    font-weight: 700;
    font-size: 0.85rem;
    padding: 12px 8px;
    border-bottom: 2px solid #dee2e6;
}
.custom-table tbody td {
    padding: 8px;
    font-size: 0.85rem;
    border-bottom: 1px solid #f1f1f1;
}
.row-invalid { background-color: #fff3cd !important; }
.editable-cell input {
    border: 1px solid transparent;
    background: transparent;
    width: 100%;
    padding: 2px 5px;
    font-size: 0.85rem;
}
.editable-cell input:focus {
    border-color: #198754;
    background: #fff;
    outline: none;
}
.status-badge {
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 700;
    display: inline-block;
}
.status-valid { background-color: #e8f5e9; color: #2e7d32; }
.status-invalid { background-color: #ffc107; color: #000; }
</style>

<script>
let previewData = [];

// Handle Education Type dependent levels
document.getElementById('education_type').addEventListener('change', function() {
    const type = this.value;
    const levelSelect = document.getElementById('level_id');
    
    if (!type) {
        levelSelect.innerHTML = '<option value="">-- Select Type First --</option>';
        levelSelect.disabled = true;
        return;
    }
    
    levelSelect.innerHTML = '<option value="">Loading...</option>';
    levelSelect.disabled = true;
    
    fetch(`/academic-levels/${type}`)
        .then(response => response.json())
        .then(data => {
            levelSelect.innerHTML = '<option value="">-- Select Class --</option>';
            data.forEach(level => {
                const option = document.createElement('option');
                option.value = level.id;
                option.textContent = level.name;
                levelSelect.appendChild(option);
            });
            levelSelect.disabled = false;
        });
});

document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const btn = this.querySelector('button[type="submit"]');
    
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Processing...';
    
    fetch('{{ route("students.preview") }}', {
        method: 'POST',
        body: formData,
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    })
    .then(response => response.json())
    .then(data => {
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-eye me-1"></i> Preview & Verify';
        
        if (data.success) {
            previewData = data.data;
            renderPreview();
            document.getElementById('uploadCard').classList.add('d-none');
            document.getElementById('previewCard').classList.remove('d-none');
        } else {
            showToast('error', data.message || 'Error processing file');
        }
    })
    .catch(error => {
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-eye me-1"></i> Preview & Verify';
        showToast('error', 'Network error occurred');
    });
});

function renderPreview() {
    const tbody = document.getElementById('previewBody');
    let html = '';
    let valid = 0, invalid = 0;
    
    previewData.forEach((row, index) => {
        const isInvalid = row.status === 'invalid';
        if (isInvalid) invalid++; else valid++;
        
        html += `
            <tr class="${isInvalid ? 'row-invalid' : ''}" data-index="${index}">
                <td class="ps-3 text-muted small">${index + 1}</td>
                <td class="editable-cell"><input type="text" value="${row.first_name}" onchange="updateCell(${index}, 'first_name', this.value)"></td>
                <td class="editable-cell"><input type="text" value="${row.middle_name}" onchange="updateCell(${index}, 'middle_name', this.value)"></td>
                <td class="editable-cell"><input type="text" value="${row.last_name}" onchange="updateCell(${index}, 'last_name', this.value)"></td>
                <td>
                    <select class="form-select form-select-sm border-0 bg-transparent" onchange="updateCell(${index}, 'sex', this.value)">
                        <option value="Male" ${row.sex === 'Male' ? 'selected' : ''}>Male</option>
                        <option value="Female" ${row.sex === 'Female' ? 'selected' : ''}>Female</option>
                    </select>
                </td>
                <td class="editable-cell"><input type="text" value="${row.prem_number}" onchange="updateCell(${index}, 'prem_number', this.value)"></td>
                <td>
                    <span class="status-badge ${isInvalid ? 'status-invalid' : 'status-valid'}">
                        ${isInvalid ? 'ERROR' : 'READY'}
                    </span>
                </td>
                <td class="text-end pe-3">
                    <button type="button" class="btn btn-link btn-sm text-danger p-0" onclick="removeRow(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html || '<tr><td colspan="8" class="text-center py-4">No data to display</td></tr>';
    document.getElementById('validCount').textContent = valid + ' valid';
    document.getElementById('invalidCount').textContent = invalid + ' invalid';
}

function updateCell(index, field, value) {
    previewData[index][field] = value;
    if (field === 'first_name' || field === 'last_name') {
        previewData[index].status = (previewData[index].first_name && previewData[index].last_name) ? 'valid' : 'invalid';
        renderPreview();
    }
}

function removeRow(index) {
    previewData.splice(index, 1);
    renderPreview();
}

document.getElementById('clearInvalidBtn').addEventListener('click', function() {
    previewData = previewData.filter(row => row.status === 'valid');
    renderPreview();
});

document.getElementById('backBtn').addEventListener('click', function() {
    document.getElementById('previewCard').classList.add('d-none');
    document.getElementById('uploadCard').classList.remove('d-none');
});

document.getElementById('confirmImportBtn').addEventListener('click', function() {
    const validData = previewData.filter(row => row.status === 'valid');
    if (validData.length === 0) {
        showToast('warning', 'No valid records to import');
        return;
    }
    
    if (!confirm(`Import ${validData.length} students?`)) return;
    
    const btn = this;
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Processing...';
    
    fetch('{{ route("students.import") }}', {
        method: 'POST',
        body: JSON.stringify({
            students: validData,
            school_id: document.getElementById('school_id').value,
            level_id: document.getElementById('level_id').value
        }),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast('success', data.message);
            setTimeout(() => window.location.href = '{{ route("students.index") }}', 1500);
        } else {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-check-circle me-1"></i> Confirm Import';
            showToast('error', data.message || 'Import failed');
        }
    })
    .catch(error => {
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-check-circle me-1"></i> Confirm Import';
        showToast('error', 'Network error occurred');
    });
});
</script>
@endsection
