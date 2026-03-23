@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Import Schools</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('home') }}">Dashboard</a>
        <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
        <a href="{{ route('schools.index') }}">Schools</a>
        <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Import</span>
    </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <!-- Upload Card -->
        <div class="card" id="uploadCard">
            <div class="card-header py-2">
                <h6 class="card-title mb-0"><i class="fas fa-file-upload text-primary me-2"></i> Upload Excel File</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-info py-2 small">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Required Columns:</strong>
                            <ul class="mb-0 mt-1">
                                <li><strong>A:</strong> School Name</li>
                                <li><strong>B:</strong> Registration Number</li>
                                <li><strong>C:</strong> Category</li>
                                <li><strong>D:</strong> Type</li>
                                <li><strong>E:</strong> Region</li>
                                <li><strong>F:</strong> District</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-secondary py-2 small">
                            <i class="fas fa-optional me-2"></i>
                            <strong>Optional Columns:</strong>
                            <ul class="mb-0 mt-1">
                                <li><strong>G:</strong> Ward</li>
                                <li><strong>H:</strong> Address</li>
                                <li><strong>I:</strong> Email</li>
                                <li><strong>J:</strong> Phone</li>
                                <li><strong>K:</strong> Headmaster Name</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Select Excel File (.xlsx)</label>
                            <input type="file" name="import_file" id="importFile" class="form-control" accept=".xlsx,.xls" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> Preview & Edit Data
                            </button>
                            <a href="{{ route('schools.index') }}" class="btn btn-light border">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="card d-none" id="previewCard">
            <div class="card-header py-2 d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0"><i class="fas fa-edit text-success me-2"></i> Edit & Confirm Import</h6>
                <div>
                    <span class="badge bg-info me-2" id="validCount">0 valid</span>
                    <span class="badge bg-warning" id="invalidCount">0 invalid</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mb-0" id="previewTable">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 35px;">
                                    <input type="checkbox" class="form-check-input" id="selectAll" checked>
                                </th>
                                <th style="width: 30px;">#</th>
                                <th style="min-width: 150px;">School Name</th>
                                <th style="min-width: 100px;">Reg. No.</th>
                                <th style="min-width: 100px;">Category</th>
                                <th style="min-width: 100px;">Type</th>
                                <th style="min-width: 100px;">Region</th>
                                <th style="min-width: 100px;">District</th>
                                <th style="width: 80px;">Status</th>
                                <th style="width: 30px;"></th>
                            </tr>
                        </thead>
                        <tbody id="previewBody">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-light border" id="backBtn">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </button>
                <div>
                    <button type="button" class="btn btn-outline-danger me-2" id="removeInvalidBtn">
                        <i class="fas fa-trash me-1"></i> Remove Invalid
                    </button>
                    <button type="button" class="btn btn-success" id="importBtn">
                        <i class="fas fa-check me-1"></i> Import Selected
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header py-2">
                <h6 class="card-title mb-0"><i class="fas fa-download text-info me-2"></i> Template</h6>
            </div>
            <div class="card-body text-center">
                <p class="text-muted small mb-2">Download Excel template with sample data</p>
                <a href="{{ route('schools.download-template') }}" class="btn btn-outline-primary w-100">
                    <i class="fas fa-file-excel me-1"></i> Download Template
                </a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header py-2">
                <h6 class="card-title mb-0"><i class="fas fa-list text-primary me-2"></i> Valid Values</h6>
            </div>
            <div class="card-body small p-2">
                <div class="mb-2">
                    <strong class="text-muted d-block mb-1">Category:</strong>
                    <span class="badge bg-light text-dark me-1">Nursery</span>
                    <span class="badge bg-light text-dark me-1">Primary</span>
                    <span class="badge bg-light text-dark me-1">Secondary</span>
                    <span class="badge bg-light text-dark me-1">College</span>
                    <span class="badge bg-light text-dark">Vocational</span>
                </div>
                <div class="mb-2">
                    <strong class="text-muted d-block mb-1">Type:</strong>
                    <span class="badge bg-light text-dark me-1">Government</span>
                    <span class="badge bg-light text-dark me-1">Private</span>
                    <span class="badge bg-light text-dark me-1">Faith-based</span>
                    <span class="badge bg-light text-dark">Community</span>
                </div>
                <div>
                    <strong class="text-muted d-block mb-1">Regions:</strong>
                    <small class="text-muted">Use dropdown in table to select</small>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header py-2">
                <h6 class="card-title mb-0"><i class="fas fa-lightbulb text-warning me-2"></i> Tips</h6>
            </div>
            <div class="card-body small">
                <ul class="mb-0 ps-3">
                    <li>Edit any cell directly in the table</li>
                    <li>Use dropdowns for Category, Type, Region, District</li>
                    <li>Invalid rows will be highlighted</li>
                    <li>Remove invalid rows before import</li>
                    <li>Max 500 records per import</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h6 class="modal-title"><i class="fas fa-edit me-2"></i>Edit School Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="editModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEditBtn">
                    <i class="fas fa-check me-1"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.row-invalid { background-color: #fff3cd !important; }
.row-valid { background-color: #d4edda !important; }
.row-duplicate { background-color: #f8d7da !important; }
.editable-cell { cursor: pointer; }
.editable-cell:hover { background-color: #e9ecef; }
.table-select { border: none; background: transparent; font-size: 0.85rem; width: 100%; }
.table-input { border: none; background: transparent; font-size: 0.85rem; width: 100%; }
.table-input:focus, .table-select:focus { outline: 1px solid #0d6efd; background: #fff; }
</style>

<script>
let previewData = [];
let categories = {!! \App\Models\SchoolCategory::pluck('name')->toJson() !!};
let types = {!! \App\Models\SchoolType::pluck('name')->toJson() !!};
let regionsData = {!! \App\Models\Region::with('districts')->get(['id', 'name'])->toJson() !!};
let editingIndex = null;

// Build regions object
let regions = regionsData.map(r => r.name);
let regionDistricts = {};
regionsData.forEach(r => {
    regionDistricts[r.name] = r.districts.map(d => d.name);
});

console.log('Categories:', categories);
console.log('Types:', types);
console.log('Regions:', regions.length);

document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const fileInput = document.getElementById('importFile');
    
    if (!fileInput.files[0]) {
        showToast('warning', 'Please select a file');
        return;
    }
    
    const btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Processing...';
    
    fetch('{{ route("schools.preview") }}', {
        method: 'POST',
        body: formData,
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Preview response:', data);
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-eye me-1"></i> Preview & Edit Data';
        
        if (data.success) {
            previewData = data.data;
            renderPreview();
            document.getElementById('uploadCard').classList.add('d-none');
            document.getElementById('previewCard').classList.remove('d-none');
        } else {
            alert(data.message || 'Error processing file');
        }
    })
    .catch(error => {
        console.error('Upload error:', error);
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-eye me-1"></i> Preview & Edit Data';
        showToast('error', 'Error uploading file: ' + error.message);
    });
});

function renderPreview() {
    const tbody = document.getElementById('previewBody');
    let html = '';
    let validCount = 0, invalidCount = 0;
    
    if (!previewData || previewData.length === 0) {
        tbody.innerHTML = '<tr><td colspan="10" class="text-center py-3">No data found in file</td></tr>';
        return;
    }
    
    previewData.forEach((row, index) => {
        const rowClass = row.status === 'valid' ? 'row-valid' : 
                        (row.status === 'duplicate' ? 'row-duplicate' : 'row-invalid');
        const statusIcon = row.status === 'valid' ? 'fa-check-circle text-success' : 
                          (row.status === 'duplicate' ? 'fa-exclamation-triangle text-warning' : 'fa-times-circle text-danger');
        const statusText = row.status === 'valid' ? 'OK' : 
                          (row.status === 'duplicate' ? 'Duplicate' : row.message || 'Invalid');
        
        if (row.status === 'valid') validCount++;
        else invalidCount++;
        
        html += `
            <tr class="${rowClass}" data-index="${index}">
                <td class="text-center">
                    <input type="checkbox" class="form-check-input row-check" data-index="${index}" 
                           ${row.status === 'valid' ? 'checked' : ''} 
                           ${row.status !== 'valid' ? 'disabled' : ''}>
                </td>
                <td>${index + 1}</td>
                <td class="editable-cell">
                    <input type="text" class="table-input" value="${row.name || ''}" 
                           data-field="name" data-index="${index}" onchange="updateData(this)">
                </td>
                <td class="editable-cell">
                    <input type="text" class="table-input" value="${row.registration_number || ''}" 
                           data-field="registration_number" data-index="${index}" onchange="updateData(this)">
                </td>
                <td class="editable-cell">
                    <select class="table-select" data-field="category" data-index="${index}" onchange="updateData(this)">
                        <option value="">Select</option>
                        ${categories.map(c => `<option value="${c}" ${row.category === c ? 'selected' : ''}>${c}</option>`).join('')}
                    </select>
                </td>
                <td class="editable-cell">
                    <select class="table-select" data-field="type" data-index="${index}" onchange="updateData(this)">
                        <option value="">Select</option>
                        ${types.map(t => `<option value="${t}" ${row.type === t ? 'selected' : ''}>${t}</option>`).join('')}
                    </select>
                </td>
                <td class="editable-cell">
                    <select class="table-select" data-field="region" data-index="${index}" onchange="updateRegion(this)">
                        <option value="">Select</option>
                        ${regions.map(r => `<option value="${r}" ${row.region === r ? 'selected' : ''}>${r}</option>`).join('')}
                    </select>
                </td>
                <td class="editable-cell">
                    <select class="table-select" data-field="district" data-index="${index}" onchange="updateData(this)">
                        <option value="">Select</option>
                        ${(regionDistricts[row.region] || []).map(d => `<option value="${d}" ${row.district === d ? 'selected' : ''}>${d}</option>`).join('')}
                    </select>
                </td>
                <td><i class="fas ${statusIcon}"></i> <small>${statusText}</small></td>
                <td>
                    <button type="button" class="btn btn-sm btn-link p-0" onclick="openEditModal(${index})" title="Edit full details">
                        <i class="fas fa-edit text-primary"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html;
    document.getElementById('validCount').textContent = validCount + ' valid';
    document.getElementById('invalidCount').textContent = invalidCount + ' invalid';
}

function updateData(input) {
    const index = parseInt(input.dataset.index);
    const field = input.dataset.field;
    previewData[index][field] = input.value;
    validateRow(index);
}

function updateRegion(select) {
    const index = parseInt(select.dataset.index);
    const region = select.value;
    previewData[index].region = region;
    previewData[index].district = '';
    
    // Update district dropdown
    const row = select.closest('tr');
    const districtSelect = row.querySelector('select[data-field="district"]');
    
    districtSelect.innerHTML = '<option value="">Select</option>' + 
        (regionDistricts[region] || []).map(d => `<option value="${d}">${d}</option>`).join('');
    
    validateRow(index);
}

function validateRow(index) {
    const row = previewData[index];
    let status = 'valid';
    let message = '';
    
    if (!row.name) {
        status = 'invalid';
        message = 'Name required';
    } else if (!row.registration_number) {
        status = 'invalid';
        message = 'Reg. No. required';
    } else if (!row.category || !categories.includes(row.category)) {
        status = 'invalid';
        message = 'Invalid category';
    } else if (!row.type || !types.includes(row.type)) {
        status = 'invalid';
        message = 'Invalid type';
    } else if (!row.region || !regions.includes(row.region)) {
        status = 'invalid';
        message = 'Invalid region';
    } else if (!row.district || !(regionDistricts[row.region] || []).includes(row.district)) {
        status = 'invalid';
        message = 'Invalid district';
    }
    
    row.status = status;
    row.message = message;
    updateRowUI(index);
}

function updateRowUI(index) {
    const row = document.querySelector(`tr[data-index="${index}"]`);
    if (!row) return;
    
    const rowClass = previewData[index].status === 'valid' ? 'row-valid' : 
                    (previewData[index].status === 'duplicate' ? 'row-duplicate' : 'row-invalid');
    
    row.className = rowClass;
    
    const statusIcon = previewData[index].status === 'valid' ? 'fa-check-circle text-success' : 
                      (previewData[index].status === 'duplicate' ? 'fa-exclamation-triangle text-warning' : 'fa-times-circle text-danger');
    const statusText = previewData[index].status === 'valid' ? 'OK' : 
                      (previewData[index].status === 'duplicate' ? 'Duplicate' : previewData[index].message || 'Invalid');
    
    row.querySelector('td:nth-child(9)').innerHTML = `<i class="fas ${statusIcon}"></i> <small>${statusText}</small>`;
    
    const checkbox = row.querySelector('.row-check');
    checkbox.disabled = previewData[index].status !== 'valid';
    checkbox.checked = previewData[index].status === 'valid';
    
    // Update counts
    let validCount = 0, invalidCount = 0;
    previewData.forEach(r => r.status === 'valid' ? validCount++ : invalidCount++);
    document.getElementById('validCount').textContent = validCount + ' valid';
    document.getElementById('invalidCount').textContent = invalidCount + ' invalid';
}

function openEditModal(index) {
    editingIndex = index;
    const row = previewData[index];
    
    document.getElementById('editModalBody').innerHTML = `
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">School Name</label>
                <input type="text" class="form-control" id="editName" value="${row.name || ''}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="editRegNo" value="${row.registration_number || ''}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" id="editCategory">
                    <option value="">Select Category</option>
                    ${categories.map(c => `<option value="${c}" ${row.category === c ? 'selected' : ''}>${c}</option>`).join('')}
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Type</label>
                <select class="form-select" id="editType">
                    <option value="">Select Type</option>
                    ${types.map(t => `<option value="${t}" ${row.type === t ? 'selected' : ''}>${t}</option>`).join('')}
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Region</label>
                <select class="form-select" id="editRegion" onchange="updateModalDistricts()">
                    <option value="">Select Region</option>
                    ${regions.map(r => `<option value="${r}" ${row.region === r ? 'selected' : ''}>${r}</option>`).join('')}
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">District</label>
                <select class="form-select" id="editDistrict">
                    <option value="">Select District</option>
                    ${(regionDistricts[row.region] || []).map(d => `<option value="${d}" ${row.district === d ? 'selected' : ''}>${d}</option>`).join('')}
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Ward</label>
                <input type="text" class="form-control" id="editWard" value="${row.ward || ''}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" id="editAddress" value="${row.address || ''}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="editEmail" value="${row.email || ''}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" id="editPhone" value="${row.phone || ''}">
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label">Headmaster Name</label>
                <input type="text" class="form-control" id="editHeadmaster" value="${row.headmaster_name || ''}">
            </div>
        </div>
    `;
    
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

function updateModalDistricts() {
    const region = document.getElementById('editRegion').value;
    const districtSelect = document.getElementById('editDistrict');
    
    districtSelect.innerHTML = '<option value="">Select District</option>' +
        (regionDistricts[region] || []).map(d => `<option value="${d}">${d}</option>`).join('');
}

document.getElementById('saveEditBtn').addEventListener('click', function() {
    const index = editingIndex;
    previewData[index] = {
        ...previewData[index],
        name: document.getElementById('editName').value,
        registration_number: document.getElementById('editRegNo').value,
        category: document.getElementById('editCategory').value,
        type: document.getElementById('editType').value,
        region: document.getElementById('editRegion').value,
        district: document.getElementById('editDistrict').value,
        ward: document.getElementById('editWard').value,
        address: document.getElementById('editAddress').value,
        email: document.getElementById('editEmail').value,
        phone: document.getElementById('editPhone').value,
        headmaster_name: document.getElementById('editHeadmaster').value
    };
    
    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    renderPreview();
});

document.getElementById('selectAll').addEventListener('change', function() {
    document.querySelectorAll('.row-check:not(:disabled)').forEach(cb => {
        cb.checked = this.checked;
    });
});

document.getElementById('removeInvalidBtn').addEventListener('click', function() {
    previewData = previewData.filter(row => row.status === 'valid');
    renderPreview();
});

document.getElementById('backBtn').addEventListener('click', function() {
    document.getElementById('previewCard').classList.add('d-none');
    document.getElementById('uploadCard').classList.remove('d-none');
});

document.getElementById('importBtn').addEventListener('click', function() {
    const selected = [];
    document.querySelectorAll('.row-check:checked').forEach(cb => {
        selected.push(previewData[cb.dataset.index]);
    });
    
    if (selected.length === 0) {
        showToast('warning', 'Please select at least one record to import');
        return;
    }
    
    if (!confirm(`Import ${selected.length} school(s)?`)) return;
    
    this.disabled = true;
    this.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Importing...';
    
    fetch('{{ route("schools.import") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ schools: selected })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast('success', data.message);
            setTimeout(() => window.location.href = '{{ route("schools.index") }}', 1500);
        } else {
            showToast('error', data.message || 'Import failed');
            this.disabled = false;
            this.innerHTML = '<i class="fas fa-check me-1"></i> Import Selected';
        }
    })
    .catch(error => {
        showToast('error', 'Import failed. Please try again.');
        this.disabled = false;
        this.innerHTML = '<i class="fas fa-check me-1"></i> Import Selected';
    });
});
</script>
@endsection
