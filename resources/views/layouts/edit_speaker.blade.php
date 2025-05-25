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
  .signature-img {
    height: 80px;
    width: 300px;
    object-fit: contain;
    border: 1px solid #ccc;
    margin-left: 10px;
  }
  .required {
    color: red;
  }
</style>

<div class="border border-success rounded" style="margin: 20px">
  <div class="form-section-header">Update Speaker Information</div>

  <form class="p-4 needs-validation" enctype="multipart/form-data" method="POST" action="{{ route('speakers.update', $speaker->id) }}" novalidate id="speakerForm">
    @csrf
    @method('PUT')

    <div class="row g-3">
      <!-- Left Column -->
      <div class="col-md-6">
        <label class="form-label">Name <span class="required">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name', $speaker->name) }}" required>
        <div class="invalid-feedback">Name is required.</div>

        <label class="form-label mt-3">Mobile No <span class="required">*</span></label>
        <input type="tel" name="phone" class="form-control" placeholder="Enter mobile number" value="{{ old('phone', $speaker->phone) }}" required pattern="^[0-9]{11}$">
        <div class="invalid-feedback">Enter a valid 11-digit mobile number.</div>

        <label class="form-label mt-3">Designation <span class="required">*</span></label>
        <input type="text" name="designation" class="form-control" placeholder="Enter designation" value="{{ old('designation', $speaker->designation) }}" required>
        <div class="invalid-feedback">Designation is required.</div>

        <label class="form-label mt-3">Profile Image</label>
        <input type="file" name="profile_image" id="profileImage" class="form-control" accept=".jpg,.jpeg">
        <img src="{{ asset($speaker->profile_image ?? 'https://via.placeholder.com/70x70?text=Photo') }}" alt="Profile" class="preview-img" id="profilePreview">
        <small class="text-danger">[File Format: *.jpg/.jpeg]</small>

        <div class="mt-4">
          <label class="form-label">Status <span class="required">*</span>:</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="active" {{ old('status', $speaker->status) == 'active' ? 'checked' : '' }} required>
              <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="inactive" {{ old('status', $speaker->status) == 'inactive' ? 'checked' : '' }}>
              <label class="form-check-label">Inactive</label>
            </div>
          </div>
          <div class="invalid-feedback">Please select a status.</div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <label class="form-label">Email <span class="required">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email', $speaker->email) }}" required>
        <div class="invalid-feedback">Enter a valid email address.</div>

        <label class="form-label mt-3">Gender <span class="required">*</span></label>
        <select name="gender" class="form-select" required>
          <option value="">Select Gender</option>
          <option value="male" {{ old('gender', $speaker->gender) == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender', $speaker->gender) == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender', $speaker->gender) == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        <div class="invalid-feedback">Please select a gender.</div>

        <label class="form-label mt-3">Organization <span class="required">*</span></label>
        <input type="text" name="organization" class="form-control" placeholder="Enter organization name" value="{{ old('organization', $speaker->organization) }}" required>
        <div class="invalid-feedback">Organization name is required.</div>

        <label class="form-label mt-3">Signature</label>
        <input type="file" name="signature" id="signatureFile" class="form-control" accept=".jpg,.jpeg,.png">
        <img src="{{ asset($speaker->signature ?? 'https://via.placeholder.com/300x80?text=Sign') }}" alt="Signature" class="signature-img" id="signaturePreview">
        <small class="text-danger d-block">
          [File Format: *.jpg/.jpeg/.png]<br>
          [File Size: &lt;100KB]<br>
          [Dimensions: Height: 80px, Width: 300px]
        </small>

        <label class="form-label mt-3">Link</label>
        <input type="url" name="link" class="form-control" placeholder="Enter website/social media link" value="{{ old('link', $speaker->link) }}">
      </div>
    </div>

    <div class="mt-4 d-flex justify-content-between">
      <a href="/speaker_content" class="btn btn-secondary">✖ Close</a>
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>

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

  document.getElementById('profileImage').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('profilePreview').src = URL.createObjectURL(file);
    }
  });

  document.getElementById('signatureFile').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('signaturePreview').src = URL.createObjectURL(file);
    }
  });
})();
</script>
@endsection
