@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New School</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('home') }}">Dashboard</a>
        <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
        <a href="{{ route('schools.index') }}">Schools</a>
        <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Add School</span>
    </div>
</div>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header py-2">
                <h6 class="card-title mb-0">School Details</h6>
            </div>
            <form action="{{ route('schools.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <!-- Basic Info -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">School Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Registration Number <span class="text-danger">*</span></label>
                            <input type="text" name="registration_number" class="form-control @error('registration_number') is-invalid @enderror" value="{{ old('registration_number') }}" required placeholder="e.g. S.0123/456">
                            @error('registration_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->name }}" {{ old('category') == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">School Type <span class="text-danger">*</span></label>
                            <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                                <option value="">Select Type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->name }}" {{ old('type') == $type->name ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Region <span class="text-danger">*</span></label>
                            <select name="region" id="regionSelect" class="form-select @error('region') is-invalid @enderror" required>
                                <option value="">Select Region</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->name }}" data-id="{{ $region->id }}" {{ old('region') == $region->name ? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach
                            </select>
                            @error('region')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <select name="district" id="districtSelect" class="form-select @error('district') is-invalid @enderror" required disabled>
                                <option value="">Select District</option>
                            </select>
                            @error('district')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ward</label>
                            <input type="text" name="ward" class="form-control" value="{{ old('ward') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        </div>

                        <!-- Contact -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">School Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">School Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Headmaster / Principal Name</label>
                            <input type="text" name="headmaster_name" class="form-control" value="{{ old('headmaster_name') }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('schools.index') }}" class="btn btn-light border">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Save School</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('regionSelect').addEventListener('change', function() {
    const districtSelect = document.getElementById('districtSelect');
    const selectedOption = this.options[this.selectedIndex];
    const regionId = selectedOption.dataset.id;
    
    districtSelect.innerHTML = '<option value="">Loading...</option>';
    districtSelect.disabled = true;
    
    if (regionId) {
        fetch('/districts/' + regionId)
            .then(response => response.json())
            .then(data => {
                districtSelect.innerHTML = '<option value="">Select District</option>';
                data.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.name;
                    option.textContent = district.name;
                    districtSelect.appendChild(option);
                });
                districtSelect.disabled = false;
            });
    }
});
</script>
@endsection
