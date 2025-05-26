@extends('dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .form-section-header {
    background-color: green;
    color: white;
    padding: 12px 20px;
    font-weight: bold;
  }
  .preview-img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border: 1px solid #ccc;
    margin-left: 10px;
  }
  .required {
    color: red;
  }
  .is-invalid {
    border-color: #dc3545 !important;
    background-color: #fff5f5 !important;
  }
</style>

<div class="border border-success rounded" style="margin: 20px">
  <div class="form-section-header">
    Add Speaker Information
  </div>

  <form class="p-4 needs-validation" enctype="multipart/form-data" method="POST" action="{{ route('speakers.store') }}" novalidate id="speakerForm">
    @csrf
    <div class="row g-3">
      <!-- Left Column -->
      <div class="col-md-6">
        <!-- Name -->
        <label class="form-label">Name <span class="required">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}" required>
        <div class="invalid-feedback">Name is required.</div>

        <!-- Mobile No -->
        <label class="form-label mt-3">Mobile No <span class="required">*</span></label>
        <input type="tel" name="phone" class="form-control" placeholder="Enter mobile number" value="{{ old('phone') }}" required pattern="^[0-9]{11}$">
        <div class="invalid-feedback">Enter a valid 11-digit mobile number.</div>

        <!-- Designation -->
        <label class="form-label mt-3">Designation <span class="required">*</span></label>
        <input type="text" name="designation" class="form-control" placeholder="Enter designation" value="{{ old('designation') }}" required>
        <div class="invalid-feedback">Designation is required.</div>

        <!-- Profile Image -->
        <label class="form-label mt-3">Profile Image <span class="required">*</span></label>
        <input type="file" name="profile_image" id="profileImage" class="form-control" accept=".jpg,.jpeg" required>
        <img src="https://via.placeholder.com/70x70?text=Photo" alt="Profile" class="preview-img" id="profilePreview">
        <small class="text-danger">[File Format: *.jpg/.jpeg]</small>
        <div class="invalid-feedback">Profile image is required.</div>

        <!-- Status -->
        <div class="mt-4">
          <label class="form-label">Status <span class="required">*</span>:</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }} required>
              <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="deactive" {{ old('status') == 'deactive' ? 'checked' : '' }}>
              <label class="form-check-label">deactive</label>
            </div>
          </div>
          <div class="invalid-feedback d-block">Please select a status.</div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <!-- Email -->
        <label class="form-label">Email <span class="required">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}" required>
        <div class="invalid-feedback">Enter a valid email address.</div>

        <!-- Gender -->
        <label class="form-label mt-3">Gender <span class="required">*</span></label>
        <select name="gender" class="form-select" required>
          <option value="">Select Gender</option>
          <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        <div class="invalid-feedback">Please select a gender.</div>

        <!-- Organization -->
        <label class="form-label mt-3">Organization <span class="required">*</span></label>
        <input type="text" name="organization" class="form-control" placeholder="Enter organization name" value="{{ old('organization') }}" required>
        <div class="invalid-feedback">Organization name is required.</div>

        <!-- Signature -->
        <label class="form-label mt-3">Signature <span class="required">*</span></label>
        <input type="file" name="signature" id="signatureFile" class="form-control" accept=".jpg,.jpeg,.png" required>
        <img src="https://via.placeholder.com/80x40?text=Sign" alt="Signature" class="preview-img ms-2" id="signaturePreview">
        <small class="text-danger d-block">
          [File Format: *.jpg/.jpeg/.png]<br>
          [File Size: &lt;100KB]<br>
          [Dimensions: Height: 80px, Width: 300px]
        </small>
        <div class="invalid-feedback">Signature is required.</div>

        <!-- Link -->
        <label class="form-label mt-3">Link</label>
        <input type="url" name="link" class="form-control" placeholder="Enter website/social media link" value="{{ old('link') }}">
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 d-flex justify-content-between">
      <a href="/speaker/list">
        <button type="button" class="btn btn-secondary">✖ Close</button>
      </a>
      <a href="/speaker/list">
      <button type="submit" class="btn btn-success">Save</button>
      </a>
      
    </div>
  </form>
</div>

<!-- JavaScript for form validation and image preview -->
<script>
(() => {
  'use strict';
  const form = document.getElementById('speakerForm');

  form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    const signatureInput = document.getElementById('signatureFile');
    if (signatureInput.files.length) {
      const file = signatureInput.files[0];
      if (file.size > 100 * 1024) {
        alert('Signature file must be less than 100KB');
        event.preventDefault();
        return false;
      }
    }

    form.classList.add('was-validated');
  });

  // Profile image preview
  document.getElementById('profileImage').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('profilePreview').src = URL.createObjectURL(file);
    }
  });

  // Signature preview
  document.getElementById('signatureFile').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('signaturePreview').src = URL.createObjectURL(file);
    }
  });
})();
</script>
@endsection
