@extends('dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
  .is-invalid {
    border-color: #dc3545 !important;
    background-color: #fff5f5 !important;
  }
  .invalid-feedback {
    display: none !important;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875rem;
    color: #dc3545;
    font-weight: 500;
  }
  .invalid-feedback.d-block {
    display: block !important;
  }
  /* Show client-side error messages when is-invalid class is applied via JavaScript */
  .is-invalid + .invalid-feedback:not(.d-block) {
    display: block !important;
  }
  
  /* Enhanced error styling */
  .is-invalid {
    border-color: #dc3545 !important;
    background-color: #fff5f5 !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
  }
  
  /* Error shake animation */
  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
  }
  
  .shake {
    animation: shake 0.5s ease-in-out;
  }
  
  /* File Upload Guidelines Styling */
  .file-guidelines {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 12px;
    margin-top: 8px;
    font-size: 0.85rem;
  }
  
  .file-guidelines h6 {
    color: #495057;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 0.9rem;
  }
  
  .guideline-item {
    display: flex;
    align-items: center;
    margin-bottom: 4px;
    color: #6c757d;
  }
  
  .guideline-item:last-child {
    margin-bottom: 0;
  }
  
  .guideline-icon {
    color: #28a745;
    margin-right: 8px;
    font-weight: bold;
  }
  
  .storage-note {
    background-color: #e7f3ff;
    border-left: 3px solid #007bff;
    padding: 6px 10px;
    margin-top: 8px;
    font-size: 0.8rem;
    color: #0056b3;
    border-radius: 0 4px 4px 0;
  }
  
  .storage-note .info-icon {
    color: #007bff;
    margin-right: 5px;
  }
  
  /* Responsive design for file guidelines */
  @media (max-width: 768px) {
    .file-guidelines {
      font-size: 0.8rem;
      padding: 10px;
    }
    
    .file-guidelines h6 {
      font-size: 0.85rem;
    }
    
    .guideline-item {
      flex-direction: column;
      align-items: flex-start;
    }
    
    .guideline-icon {
      margin-bottom: 2px;
    }
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
        <input type="text" id="nameInput" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name" maxlength="255" value="{{ old('name', $speaker->name) }}" required>
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">The name field is required.</div>
        @enderror

        <label class="form-label mt-3">Mobile No <span class="required">*</span></label>
        <input type="tel" id="phoneInput" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter mobile number" value="{{ old('phone', $speaker->phone) }}" required pattern="^[0-9]{11}$">
        @error('phone')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">The mobile number field is required.</div>
        @enderror

        <label class="form-label mt-3">Designation <span class="required">*</span></label>
        <input type="text" id="designationInput" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Enter designation" value="{{ old('designation', $speaker->designation) }}" required>
        @error('designation')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">The designation field is required.</div>
        @enderror

        <label class="form-label mt-3">Profile Image</label>
        <input type="file" name="profile_image" id="profileImage" class="form-control @error('profile_image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.gif">
        <img src="{{ session('old_profile_image') ? session('old_profile_image') : $speaker->profile_image_url }}" alt="Profile" class="preview-img" id="profilePreview">
        
        <!-- Enhanced File Guidelines -->
        <div class="file-guidelines">
          <h6><i class="fas fa-info-circle guideline-icon"></i>Profile Image Requirements:</h6>
          <div class="guideline-item">
            <span class="guideline-icon">•</span>
            <span><strong>Accepted formats:</strong> .jpg, .jpeg, .png, .gif</span>
          </div>
          <div class="guideline-item">
            <span class="guideline-icon">•</span>
            <span><strong>Maximum file size:</strong> 2MB</span>
          </div>
          <div class="storage-note">
            <i class="fas fa-database info-icon"></i>
            <strong>Storage note:</strong> Images are stored in Base64 format for portability.
          </div>
        </div>
        
        @error('profile_image')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <div class="mt-4">
          <label class="form-label">Status <span class="required">*</span>:</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="active" {{ old('status', $speaker->status) == 'active' ? 'checked' : '' }} required>
              <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="deactive" {{ old('status', $speaker->status) == 'deactive' ? 'checked' : '' }}>
              <label class="form-check-label">Deactive</label>
            </div>
          </div>
          <div class="invalid-feedback">Please select a status.</div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">

        <!-- Expertise -->
        <label for="categorySelect">Select Expertise <span class="required">*</span></label>
<select name="exparties_categories_id[]" id="categorySelect" class="form-control select2 @error('exparties_categories_id') is-invalid @enderror" multiple required>
  @foreach($trainingCategories as $category)
    <option value="{{ $category->id }}" 
      @if(old('exparties_categories_id') && in_array($category->id, old('exparties_categories_id')))
        selected
      @elseif(!old('exparties_categories_id') && is_array($speaker->exparties_categories_id) && in_array($category->id, $speaker->exparties_categories_id))
        selected
      @elseif(!old('exparties_categories_id') && is_string($speaker->exparties_categories_id) && in_array($category->id, json_decode($speaker->exparties_categories_id, true) ?? []))
        selected
      @endif>
      {{ $category->category_name }}
    </option>
  @endforeach
</select>
        @error('exparties_categories_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">Please select at least one expertise.</div>
        @enderror


        <!-- Email -->
        <label class="form-label">Email <span class="required">*</span></label>
        <input type="email" id="emailInput" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address" value="{{ old('email', $speaker->email) }}" required>
        @error('email')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">The email field is required.</div>
        @enderror

        <!-- Gender -->
        <label class="form-label mt-3">Gender <span class="required">*</span></label>
        <select name="gender" id="genderSelect" class="form-select @error('gender') is-invalid @enderror" required>
          <option value="">Select Gender</option>
          <option value="male" {{ old('gender', $speaker->gender) == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender', $speaker->gender) == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender', $speaker->gender) == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">Please select a gender.</div>
        @enderror

        <!-- Organization -->
        <label class="form-label mt-3">Organization <span class="required">*</span></label>
        <input type="text" id="organizationInput" name="organization" class="form-control @error('organization') is-invalid @enderror" placeholder="Enter organization name" value="{{ old('organization', $speaker->organization) }}" required>
        @error('organization')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">The organization field is required.</div>
        @enderror

        <!-- Signature -->
        <label class="form-label mt-3">Signature</label>
        <input type="file" name="signature" id="signatureFile" class="form-control @error('signature') is-invalid @enderror" accept=".jpg,.jpeg,.png">
        <img src="{{ session('old_signature') ? session('old_signature') : $speaker->signature_url }}" alt="Signature" class="preview-img" id="signaturePreview">
        
        <!-- Enhanced Signature Guidelines -->
        <div class="file-guidelines">
          <h6><i class="fas fa-signature guideline-icon"></i>Signature Image Requirements:</h6>
          <div class="guideline-item">
            <span class="guideline-icon">•</span>
            <span><strong>Accepted formats:</strong> .jpg, .jpeg, .png</span>
          </div>
          <div class="guideline-item">
            <span class="guideline-icon">•</span>
            <span><strong>Maximum file size:</strong> &lt;100KB</span>
          </div>
          <div class="guideline-item">
            <span class="guideline-icon">•</span>
            <span><strong>Recommended dimensions:</strong> 300×80 px (Width × Height)</span>
          </div>
          <div class="storage-note">
            <i class="fas fa-database info-icon"></i>
            <strong>Storage note:</strong> Signatures are stored in Base64 format for database compatibility.
          </div>
        </div>
        
        @error('signature')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <!-- Link -->
        <label class="form-label mt-3">Link</label>
        <input type="url" id="linkInput" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="Enter website/social media link (e.g., https://example.com)" value="{{ old('link', $speaker->link) }}">
        @error('link')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @else
        <div class="invalid-feedback">Please enter a valid URL (e.g., https://example.com).</div>
        @enderror
      </div>
    </div>

    <div class="mt-4 d-flex justify-content-between">
      <a href="/speaker/list" class="btn btn-secondary">✖ Close</a>
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
$(document).ready(function() {
    // Initialize Select2
    $('#categorySelect').select2({
        placeholder: "Select Expertise",
        allowClear: true
    });
    
    // Ensure preserved expertise values are selected after Select2 initialization
    @if(old('exparties_categories_id'))
      const preservedValues = @json(old('exparties_categories_id'));
      $('#categorySelect').val(preservedValues).trigger('change');
    @endif
});

(() => {
  'use strict';
  const form = document.getElementById('speakerForm');

  // Function to clear server-side validation errors
  function clearServerErrors(input) {
    // Remove server-side error styling
    input.classList.remove('is-invalid');
    
    // Hide server-side error messages
    const serverErrorDiv = input.parentElement.querySelector('.invalid-feedback.d-block');
    if (serverErrorDiv) {
      serverErrorDiv.style.display = 'none';
    }
  }

  // Add input event listeners to clear server-side errors when user types
  const allInputs = form.querySelectorAll('input, select, textarea');
  allInputs.forEach(input => {
    input.addEventListener('input', function() {
      clearServerErrors(this);
    });
    
    input.addEventListener('change', function() {
      clearServerErrors(this);
    });
  });

  form.addEventListener('submit', function (event) {
    let isValid = true;

    // Remove all invalid classes first
    const fields = form.querySelectorAll('input, select, textarea');
    fields.forEach(field => {
      field.classList.remove('is-invalid');
      // Hide all client-side validation messages
      const clientErrorDiv = field.parentElement.querySelector('.invalid-feedback:not(.d-block)');
      if (clientErrorDiv) {
        clientErrorDiv.style.display = 'none';
      }
    });

    // Helper function to show error for a field
    function showFieldError(field, show = true) {
      if (show) {
        field.classList.add('is-invalid');
        field.classList.add('shake');
        
        // Remove shake animation after it completes
        setTimeout(() => {
          field.classList.remove('shake');
        }, 500);
        
        const errorDiv = field.parentElement.querySelector('.invalid-feedback:not(.d-block)');
        if (errorDiv) errorDiv.style.display = 'block';
        isValid = false;
      }
    }

    // Name validation
    const nameInput = document.querySelector('input[name="name"]');
    if (!nameInput.value.trim()) {
      showFieldError(nameInput);
    }

    // Phone validation
    const phoneInput = document.getElementById('phoneInput');
    if (!phoneInput.value.trim()) {
      showFieldError(phoneInput);
    } else if (!/^[0-9]{11}$/.test(phoneInput.value)) {
      showFieldError(phoneInput);
    }

    // Email validation
    const emailInput = document.getElementById('emailInput');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailInput.value.trim()) {
      showFieldError(emailInput);
    } else if (!emailPattern.test(emailInput.value)) {
      showFieldError(emailInput);
    }

    // Designation validation
    const designationInput = document.querySelector('input[name="designation"]');
    if (!designationInput.value.trim()) {
      showFieldError(designationInput);
    }

    // Gender validation
    const genderSelect = document.querySelector('select[name="gender"]');
    if (!genderSelect.value) {
      showFieldError(genderSelect);
    }

    // Organization validation
    const organizationInput = document.querySelector('input[name="organization"]');
    if (!organizationInput.value.trim()) {
      showFieldError(organizationInput);
    }

    // Expertise validation
    const categorySelect = document.getElementById('categorySelect');
    if (categorySelect && categorySelect.selectedOptions.length === 0) {
      showFieldError(categorySelect);
    }

    // File validation for edit form (optional fields)
    const profileInput = document.getElementById('profileImage');
    if (profileInput && profileInput.files.length) {
      const file = profileInput.files[0];
      const allowedProfileTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
      if (!allowedProfileTypes.includes(file.type)) {
        alert('Profile image must be a valid image file (JPEG, JPG, PNG, GIF).');
        showFieldError(profileInput);
      }
      if (file.size > 2 * 1024 * 1024) {
        alert('Profile image must be less than 2MB.');
        showFieldError(profileInput);
      }
    }

    const signatureInput = document.getElementById('signatureFile');
    if (signatureInput && signatureInput.files.length) {
      const file = signatureInput.files[0];
      const allowedSignatureTypes = ['image/jpeg', 'image/jpg', 'image/png'];
      if (!allowedSignatureTypes.includes(file.type)) {
        alert('Signature file must be JPG, JPEG or PNG.');
        showFieldError(signatureInput);
      }
      if (file.size > 100 * 1024) {
        alert('Signature file must be less than 100KB');
        showFieldError(signatureInput);
      }
    }

    // Link validation (optional but must be valid URL if provided)
    const linkInput = document.getElementById('linkInput');
    if (linkInput && linkInput.value.trim()) {
      const urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
      if (!urlPattern.test(linkInput.value)) {
        showFieldError(linkInput);
      }
    }

    if (!isValid) {
      event.preventDefault();
      event.stopPropagation();
      
      // Count total errors
      const errorFields = form.querySelectorAll('.is-invalid');
      const errorCount = errorFields.length;
      
      // Show summary message
      let message = `Please fill in all required fields. ${errorCount} field${errorCount > 1 ? 's' : ''} need${errorCount > 1 ? '' : 's'} attention.`;
      
      // Create or update error summary
      let errorSummary = document.getElementById('errorSummary');
      if (!errorSummary) {
        errorSummary = document.createElement('div');
        errorSummary.id = 'errorSummary';
        errorSummary.className = 'alert alert-danger mt-3';
        errorSummary.style.display = 'block';
        form.insertBefore(errorSummary, form.firstChild);
      }
      errorSummary.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i>${message}`;
      
      // Scroll to first error field
      const firstErrorField = form.querySelector('.is-invalid');
      if (firstErrorField) {
        firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        firstErrorField.focus();
      }
    } else {
      // Remove error summary if form is valid
      const errorSummary = document.getElementById('errorSummary');
      if (errorSummary) {
        errorSummary.remove();
      }
    }
  });

  // Image preview functions
  document.getElementById('profileImage')?.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('profilePreview').src = URL.createObjectURL(file);
    }
  });

  document.getElementById('signatureFile')?.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      const signaturePreview = document.getElementById('signaturePreview');
      if (signaturePreview) {
        signaturePreview.src = URL.createObjectURL(file);
      }
    }
  });

  // Handle preserved images from session for edit form
  @if(session('old_profile_image'))
    // Create a hidden input to indicate we have a preserved profile image
    const profileHidden = document.createElement('input');
    profileHidden.type = 'hidden';
    profileHidden.name = 'has_preserved_profile_image';
    profileHidden.value = '1';
    document.getElementById('speakerForm').appendChild(profileHidden);
  @endif

  @if(session('old_signature'))
    // Create a hidden input to indicate we have a preserved signature
    const signatureHidden = document.createElement('input');
    signatureHidden.type = 'hidden';
    signatureHidden.name = 'has_preserved_signature';
    signatureHidden.value = '1';
    document.getElementById('speakerForm').appendChild(signatureHidden);
  @endif

  // Add interactive tooltips for file guidelines
  document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to file guidelines
    const guidelines = document.querySelectorAll('.file-guidelines');
    guidelines.forEach(guideline => {
      guideline.addEventListener('mouseenter', function() {
        this.style.borderColor = '#007bff';
        this.style.boxShadow = '0 2px 8px rgba(0,123,255,0.15)';
      });
      
      guideline.addEventListener('mouseleave', function() {
        this.style.borderColor = '#e9ecef';
        this.style.boxShadow = 'none';
      });
    });
  });
})();
</script>

@endsection
