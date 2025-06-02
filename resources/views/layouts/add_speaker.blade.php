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
        <label for="nameInput" class="form-label">Name <span class="required">*</span></label>
        <input type="text"
               id="nameInput"
               name="name"
               class="form-control"
               placeholder="Enter full name"
               pattern="[A-Za-z.\s]+"
               title="Only alphabetic characters and spaces are allowed"
               value="{{ old('name') }}"
               maxlength="255"
               required>
        <div class="invalid-feedback">Only alphabetic characters and spaces are allowed, maximum 255 characters.</div>

        <!-- Mobile No -->
        <label for="phoneInput" class="form-label mt-3">Mobile No <span class="required">*</span></label>
        <input type="tel" id="phoneInput" name="phone" class="form-control" placeholder="Enter mobile number" value="{{ old('phone') }}" required pattern="^[0-9]{11}$">
        <div class="invalid-feedback">Enter a valid 11-digit mobile number.</div>

        <!-- Designation -->
        <label for="designationInput" class="form-label mt-3">Designation <span class="required">*</span></label>
        <input type="text" id="designationInput" name="designation" class="form-control" placeholder="Enter designation" maxlength="255" value="{{ old('designation') }}" required>
        <div class="invalid-feedback">Designation is required.</div>

        <!-- Profile Image -->
        <label for="profileImage" class="form-label mt-3">Profile Image <span class="required">*</span></label>
        <input type="file" id="profileImage" name="profile_image" class="form-control" accept=".jpg,.jpeg" required>
        <img src="{{ asset('images/no-image-found.png') }}" alt="Profile" class="preview-img" id="profilePreview">
        <small class="text-danger">[File Format: *.jpg/.jpeg]</small>
        <div class="invalid-feedback">Profile image is required.</div>

        <!-- Status -->
        <div class="mt-4">
          <label class="form-label">Status <span class="required">*</span>:</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="statusActive" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }} required>
              <label class="form-check-label" for="statusActive">Active</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="statusDeactive" value="deactive" {{ old('status') == 'deactive' ? 'checked' : '' }}>
              <label class="form-check-label" for="statusDeactive">Deactive</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">

        <!-- Expertise -->
        <label for="categorySelect">Select Expertise <span class="required">*</span></label>
<select name="exparties_categories_id[]" id="categorySelect" class="form-control select2" multiple required>
  @foreach($trainingCategories as $category)
    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
  @endforeach
</select>
        <div class="invalid-feedback">Please select at least one expertise.</div>

        <!-- Email -->
        <label for="emailInput" class="form-label mt-3">Email <span class="required">*</span></label>
        <input type="email" id="emailInput" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}" required>
        <div class="invalid-feedback">Enter a valid email address.</div>

        <!-- Gender -->
        <label for="genderSelect" class="form-label mt-3">Gender <span class="required">*</span></label>
        <select name="gender" id="genderSelect" class="form-select" required>
          <option value="">Select Gender</option>
          <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        <div class="invalid-feedback">Please select a gender.</div>

        <!-- Organization -->
        <label for="organizationInput" class="form-label mt-3">Organization <span class="required">*</span></label>
        <input type="text" id="organizationInput" name="organization" class="form-control" placeholder="Enter organization name" value="{{ old('organization') }}" required>
        <div class="invalid-feedback">Organization name is required.</div>

        <!-- Signature -->
        <label for="signatureFile" class="form-label mt-3">Signature <span class="required">*</span></label>
        <input type="file" id="signatureFile" name="signature" class="form-control" accept=".jpg,.jpeg,.png" required>
        <img src="{{ asset('images/no-image-found.png') }}" alt="Signature" class="preview-img ms-2" id="signaturePreview">
        <small class="text-danger d-block">
          [File Format: *.jpg/.jpeg/.png]<br>
          [File Size: &lt;100KB]<br>
          [Dimensions: Height: 80px, Width: 300px]
        </small>
        <div class="invalid-feedback">Signature is required.</div>

        <!-- Link -->
        <label for="linkInput" class="form-label mt-3">Link</label>
        <input type="url" id="linkInput" name="link" class="form-control" placeholder="Enter website/social media link" value="{{ old('link') }}">
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 d-flex justify-content-between">
      <a href="/speaker/list" class="btn btn-secondary">✖ Close</a>
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </form>
</div>

<!-- JavaScript for form validation -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
(() => {
  'use strict';

  const form = document.getElementById('speakerForm');

  form.addEventListener('submit', function (event) {
    let isValid = true;

    // Remove previous invalid classes
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
      input.classList.remove('is-invalid');
    });

    // Validate required inputs/selects
    inputs.forEach(input => {
      if (!input.checkValidity()) {
        input.classList.add('is-invalid');
        isValid = false;
      }
    });

    // Profile image type validation
    const profileInput = document.getElementById('profileImage');
    if (profileInput.files.length) {
      const file = profileInput.files[0];
      const allowedProfileTypes = ['image/jpeg', 'image/jpg'];
      if (!allowedProfileTypes.includes(file.type)) {
        alert('Profile image must be a JPG/JPEG file.');
        profileInput.classList.add('is-invalid');
        isValid = false;
      }
    }

    // Signature file type and size validation
    const signatureInput = document.getElementById('signatureFile');
    if (signatureInput.files.length) {
      const file = signatureInput.files[0];
      const allowedSignatureTypes = ['image/jpeg', 'image/jpg', 'image/png'];
      if (!allowedSignatureTypes.includes(file.type)) {
        alert('Signature file must be JPG, JPEG or PNG.');
        signatureInput.classList.add('is-invalid');
        isValid = false;
      }
      if (file.size > 100 * 1024) {
        alert('Signature file must be less than 100KB');
        signatureInput.classList.add('is-invalid');
        isValid = false;
      }
    }

    if (!isValid) {
      event.preventDefault();
      event.stopPropagation();
    }
  });

  // Profile image preview
  document.getElementById('profileImage').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('profilePreview').src = URL.createObjectURL(file);
    } else {
      document.getElementById('profilePreview').src = "{{ asset('images/no-image-found.png') }}";
    }
  });

  // Signature image preview
  document.getElementById('signatureFile').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('signaturePreview').src = URL.createObjectURL(file);
    } else {
      document.getElementById('signaturePreview').src = "{{ asset('images/no-image-found.png') }}";
    }
  });

  

  // Initialize Select2 for Expertise selection
  $(document).ready(function() {
    $('.select-expertise').select2({
      placeholder: "Select Expertise",
      allowClear: true
    });
  });

   @if(session('success'))
        $(document).ready(function() {
          toastr.success("{{ session('success') }}");
        });
      @endif

})();
</script>

@endsection
