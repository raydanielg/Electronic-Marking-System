@extends('layouts.dashboard')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title">Add New Student</h1>
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Dashboard</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <a href="{{ route('students.index') }}">Students</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <span>Add Student</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 mx-auto">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="card-title mb-0 text-primary fw-bold">Personal Information</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}">
                            @error('middle_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Sex <span class="text-danger">*</span></label>
                            <select name="sex" class="form-select @error('sex') is-invalid @enderror" required>
                                <option value="">Select Sex</option>
                                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('sex') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}">
                            @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="card-title mb-0 text-primary fw-bold">Admission & School Information</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">School <span class="text-danger">*</span></label>
                            <select name="school_id" class="form-select @error('school_id') is-invalid @enderror" required>
                                <option value="">Select School</option>
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                                @endforeach
                            </select>
                            @error('school_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">PREM Number</label>
                            <input type="text" name="prem_number" class="form-control @error('prem_number') is-invalid @enderror" value="{{ old('prem_number') }}">
                            @error('prem_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Admission Number</label>
                            <input type="text" name="admission_number" class="form-control @error('admission_number') is-invalid @enderror" value="{{ old('admission_number') }}">
                            @error('admission_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Admission Date</label>
                            <input type="date" name="admission_date" class="form-control @error('admission_date') is-invalid @enderror" value="{{ old('admission_date') }}">
                            @error('admission_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="Not Admitted" {{ old('status') == 'Not Admitted' ? 'selected' : '' }}>Not Admitted</option>
                                <option value="Admitted" {{ old('status') == 'Admitted' ? 'selected' : '' }}>Admitted</option>
                                <option value="Graduated" {{ old('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="card-title mb-0 text-primary fw-bold">Parent / Guardian Information</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Parent/Guardian Name</label>
                            <input type="text" name="parent_name" class="form-control @error('parent_name') is-invalid @enderror" value="{{ old('parent_name') }}">
                            @error('parent_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Parent/Guardian Phone</label>
                            <input type="text" name="parent_phone" class="form-control @error('parent_phone') is-invalid @enderror" value="{{ old('parent_phone') }}">
                            @error('parent_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3 d-flex justify-content-between">
                    <a href="{{ route('students.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Save Student</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
