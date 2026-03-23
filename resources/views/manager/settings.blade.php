@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Settings</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('home') }}">Dashboard</a>
        <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Settings</span>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card overflow-hidden shadow-sm">
            <div class="row g-0">
                <!-- Internal Sidebar -->
                <div class="col-md-3 border-end bg-light">
                    <div class="nav flex-column nav-pills p-3" id="settings-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start mb-2 py-3" id="brand-tab" data-bs-toggle="pill" data-bs-target="#brand" type="button" role="tab">
                            <i class="fas fa-palette me-2"></i> Brand Settings
                        </button>
                        <button class="nav-link text-start mb-2 py-3" id="system-tab" data-bs-toggle="pill" data-bs-target="#system" type="button" role="tab">
                            <i class="fas fa-desktop me-2"></i> System Settings
                        </button>
                        <button class="nav-link text-start mb-2 py-3" id="company-tab" data-bs-toggle="pill" data-bs-target="#company" type="button" role="tab">
                            <i class="fas fa-building me-2"></i> Company Settings
                        </button>
                        <button class="nav-link text-start mb-2 py-3" id="school-tab" data-bs-toggle="pill" data-bs-target="#school" type="button" role="tab">
                            <i class="fas fa-graduation-cap me-2"></i> School Settings
                        </button>
                        <button class="nav-link text-start mb-2 py-3" id="support-tab" data-bs-toggle="pill" data-bs-target="#support" type="button" role="tab">
                            <i class="fas fa-headset me-2"></i> Support Setting
                        </button>
                        <button class="nav-link text-start mb-2 py-3" id="document-tab" data-bs-toggle="pill" data-bs-target="#document" type="button" role="tab">
                            <i class="fas fa-file-alt me-2"></i> Document Settings
                        </button>
                    </div>
                </div>

                <!-- Settings Content -->
                <div class="col-md-9">
                    <div class="tab-content p-4" id="settings-tabContent">
                        <!-- Brand Settings -->
                        <div class="tab-pane fade show active" id="brand" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                                <div>
                                    <h4 class="mb-1 text-primary"><i class="fas fa-palette me-2"></i> Brand Settings</h4>
                                    <p class="text-muted small mb-0">Customize your application's branding and appearance</p>
                                </div>
                                <button type="submit" form="settingsForm" class="btn btn-success px-4 shadow-sm">
                                    <i class="fas fa-save me-2"></i> Save Changes
                                </button>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Logo (Light Mode)</label>
                                    <p class="text-muted extra-small mb-2">Recommended size: 100px x 30px</p>
                                    <div class="border rounded-3 p-4 text-center bg-white shadow-sm d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <h2 class="text-dark fw-bold mb-0">EMAS</h2>
                                    </div>
                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control" value="logo_dark.png" readonly>
                                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search me-1"></i> Browse</button>
                                        <button class="btn btn-outline-danger" type="button"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Logo (Dark Mode)</label>
                                    <p class="text-muted extra-small mb-2">Recommended size: 100px x 30px</p>
                                    <div class="border rounded-3 p-4 text-center bg-dark shadow-sm d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <h2 class="text-white fw-bold mb-0">EMAS</h2>
                                    </div>
                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control" value="logo_light.png" readonly>
                                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search me-1"></i> Browse</button>
                                        <button class="btn btn-outline-danger" type="button"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label class="form-label fw-bold">Favicon</label>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="border rounded-3 p-3 bg-white shadow-sm d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                            <i class="fas fa-cog text-primary fa-2x"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="favicon.png" readonly>
                                                <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search me-1"></i> Browse</button>
                                            </div>
                                            <p class="text-muted extra-small mt-1 mb-0">Recommended size: 32px x 32px</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- System Settings -->
                        <div class="tab-pane fade" id="system" role="tabpanel">
                            <form action="{{ route('settings.update') }}" method="POST" id="settingsForm">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                                    <h4 class="mb-0 text-primary"><i class="fas fa-desktop me-2"></i> System Configuration</h4>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">System Name</label>
                                        <input type="text" name="system_name" class="form-control shadow-sm" value="{{ $settings['system_name'] }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Academic Year</label>
                                        <input type="text" name="school_year" class="form-control shadow-sm" value="{{ $settings['school_year'] }}">
                                    </div>
                                </div>

                                <div class="card border-0 shadow-sm mb-4 bg-light">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-4 text-dark border-bottom pb-2">Access Control & Security</h6>
                                        <div class="form-check form-switch mb-4 p-0 ps-5">
                                            <input class="form-check-input ms-n5" type="checkbox" name="allow_clerk_registration" id="allowClerk" {{ $settings['allow_clerk_registration'] ? 'checked' : '' }} style="width: 3rem; height: 1.5rem;">
                                            <label class="form-check-label ms-2 mt-1" for="allowClerk">
                                                <span class="d-block fw-bold">Allow Clerk Registration</span>
                                                <span class="text-muted extra-small">New clerks can create their own accounts.</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-switch mb-4 p-0 ps-5">
                                            <input class="form-check-input ms-n5" type="checkbox" name="maintenance_mode" id="maintenance" {{ $settings['maintenance_mode'] ? 'checked' : '' }} style="width: 3rem; height: 1.5rem;">
                                            <label class="form-check-label ms-2 mt-1" for="maintenance">
                                                <span class="d-block fw-bold text-danger">Maintenance Mode</span>
                                                <span class="text-muted extra-small">System will be accessible only by managers.</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-switch mb-4 p-0 ps-5">
                                            <input class="form-check-input ms-n5" type="checkbox" name="clerk_can_delete_data" id="clerkDelete" {{ $settings['clerk_can_delete_data'] ? 'checked' : '' }} style="width: 3rem; height: 1.5rem;">
                                            <label class="form-check-label ms-2 mt-1" for="clerkDelete">
                                                <span class="d-block fw-bold">Clerks can delete data</span>
                                                <span class="text-muted extra-small">Grants delete permission to clerk accounts.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Placeholders for other tabs -->
                        <div class="tab-pane fade text-center py-5" id="company" role="tabpanel">
                            <i class="fas fa-building fa-4x text-muted opacity-25 mb-3"></i>
                            <h5 class="fw-bold">Company Settings</h5>
                            <p class="text-muted">Configure your school or organization's official information.</p>
                            <button class="btn btn-outline-primary btn-sm mt-2">Setup Company Info</button>
                        </div>
                        <div class="tab-pane fade text-center py-5" id="school" role="tabpanel">
                            <i class="fas fa-graduation-cap fa-4x text-muted opacity-25 mb-3"></i>
                            <h5 class="fw-bold">School Settings</h5>
                            <p class="text-muted">Define grade systems, subjects, and academic structures.</p>
                        </div>
                        <div class="tab-pane fade text-center py-5" id="support" role="tabpanel">
                            <i class="fas fa-headset fa-4x text-muted opacity-25 mb-3"></i>
                            <h5 class="fw-bold">Support Setting</h5>
                            <p class="text-muted">Configure support channels and ticket systems.</p>
                        </div>
                        <div class="tab-pane fade text-center py-5" id="document" role="tabpanel">
                            <i class="fas fa-file-alt fa-4x text-muted opacity-25 mb-3"></i>
                            <h5 class="fw-bold">Document Settings</h5>
                            <p class="text-muted">Manage storage, file types, and document templates.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* AdminLTE-style sidebar navigation */
    .nav-pills .nav-link {
        color: #495057;
        font-weight: 400;
        border-radius: 0.25rem;
        padding: 10px 15px;
        transition: all 0.15s ease-in-out;
        border-left: 3px solid transparent;
        margin-bottom: 2px;
        background: transparent;
    }
    .nav-pills .nav-link i {
        font-size: 1rem;
        width: 20px;
        text-align: center;
    }
    .nav-pills .nav-link:hover {
        background-color: #f8f9fa;
        color: #007bff;
        border-left-color: #007bff;
    }
    .nav-pills .nav-link.active {
        background-color: #e7f1ff;
        color: #007bff;
        border-left-color: #007bff;
        font-weight: 500;
    }
    .extra-small {
        font-size: 0.75rem;
    }
    .ms-n5 {
        margin-left: -3rem !important;
    }
    .form-switch .form-check-input {
        cursor: pointer;
    }
    .tab-content {
        min-height: 500px;
    }
</style>
@endsection
