@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">User Profile</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('home') }}">Dashboard</a>
        <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Profile</span>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <!-- Profile Card -->
        <div class="card">
            <div class="card-body text-center">
                <div class="position-relative d-inline-block mb-3">
                    <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->full_name) . '&size=128&color=7F9CF5&background=EBF4FF' }}" 
                         class="rounded-circle border p-1 profile-image-preview" 
                         style="width: 128px; height: 128px; object-fit: cover;" 
                         alt="{{ $user->full_name }}">
                    <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle" 
                            style="width: 32px; height: 32px; padding: 0;"
                            onclick="document.getElementById('photoInput').click()">
                        <i class="fas fa-camera"></i>
                    </button>
                    <input type="file" id="photoInput" class="d-none" accept="image/*">
                </div>
                <h4>{{ $user->full_name }}</h4>
                <p class="text-muted">{{ ucfirst($user->role) }}</p>
                <hr>
                <div class="text-start">
                    <div class="mb-2">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        <strong>Email:</strong> 
                        <span class="text-muted">{{ $user->email }}</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-phone text-primary me-2"></i>
                        <strong>Phone:</strong> 
                        <span class="text-muted">{{ $user->phone ?? 'Not set' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danger Zone Card -->
        <div class="card border-danger mt-4">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title text-white mb-0">Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small">Once you request account deletion, it will be reviewed by the administrator.</p>
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Request Account Deletion
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="info-tab" data-bs-toggle="tab" href="#info" role="tab">Personal Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="password-tab" data-bs-toggle="tab" href="#password" role="tab">Security</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="profileTabsContent">
                    <!-- Info Tab -->
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name', $user->full_name) }}" required>
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>

                    <!-- Password Tab -->
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.delete-request') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Account Deletion Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to request account deletion? Please let us know the reason.</p>
                    <div class="mb-3">
                        <label class="form-label">Reason for deletion</label>
                        <textarea name="reason" class="form-control" rows="3" required placeholder="Tell us why..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .cropper-container {
        max-height: 400px;
    }
    #cropperImage {
        max-width: 100%;
        display: block;
    }
</style>
@endpush

@push('scripts')
<div class="modal fade" id="cropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Profile Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img id="cropperImage" src="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="cropAndSave">Crop & Save</button>
            </div>
        </div>
    </div>
</div>

<script>
let cropper = null;
const photoInput = document.getElementById('photoInput');
const cropperImage = document.getElementById('cropperImage');
const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));

photoInput.addEventListener('change', function(e) {
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {
            cropperImage.src = event.target.result;
            cropModal.show();
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});

document.getElementById('cropModal').addEventListener('shown.bs.modal', function() {
    cropper = new Cropper(cropperImage, {
        aspectRatio: 1,
        viewMode: 1,
        autoCropArea: 1,
    });
});

document.getElementById('cropModal').addEventListener('hidden.bs.modal', function() {
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
    photoInput.value = '';
});

document.getElementById('cropAndSave').addEventListener('click', function() {
    if (!cropper) return;
    
    const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 300
    });
    
    canvas.toBlob(function(blob) {
        const formData = new FormData();
        formData.append('photo', blob, 'profile.jpg');
        formData.append('_token', '{{ csrf_token() }}');
        
        // Show loading state
        const btn = document.getElementById('cropAndSave');
        const originalText = btn.innerText;
        btn.disabled = true;
        btn.innerText = 'Uploading...';
        
        fetch('{{ route("profile.photo.update") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update images on page
                const previews = document.querySelectorAll('.profile-image-preview, .user-avatar-img');
                previews.forEach(img => img.src = data.url);
                cropModal.hide();
                // Optional: show toast/alert
            } else {
                alert(data.message || 'Upload failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred during upload');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerText = originalText;
        });
    }, 'image/jpeg');
});
</script>
@endpush
