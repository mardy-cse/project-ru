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

<div class="border border-success rounded m-4">
  <div class="form-section-header">Training Information</div>

  <div class="p-4">
    <form method="POST" action="#" enctype="multipart/form-data">
      @csrf

      {{-- Title --}}
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="title" class="form-label fw-bold">Title <span class="required">*</span></label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Training Name" required>
        </div>
      </div>

      {{-- Overview --}}
      <div class="mb-3">
        <label for="overview" class="form-label fw-bold">Overview <span class="required">*</span></label>
        <textarea id="overview" name="overview" class="form-control" rows="4"></textarea>
      </div>

      {{-- Why Join --}}
      <div class="mb-3">
        <label for="why_join" class="form-label fw-bold">Why Join <span class="required">*</span></label>
        <textarea id="why_join" name="why_join" class="form-control" rows="4"></textarea>
      </div>

      {{-- Best Suited For --}}
      <div class="mb-3">
        <label for="best_suited_for" class="form-label fw-bold">This Course is Best Suited For <span class="required">*</span></label>
        <textarea id="best_suited_for" name="best_suited_for" class="form-control" rows="4"></textarea>
      </div>

      {{-- Category --}}
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="categoryName" class="form-label fw-bold">Category Name <span class="required">*</span></label>
          <select name="categoryName" id="categoryName" class="form-select" required>
            <option value="">Select Category</option>
            @php
              $categories = [
                'web_development' => 'Web Development',
                'app_development' => 'App Development',
                'data_science' => 'Data Science',
                'machine_learning' => 'Machine Learning',
                'cybersecurity' => 'Cybersecurity',
                'cloud_computing' => 'Cloud Computing',
                'devops' => 'DevOps',
                'networking' => 'Networking',
                'system_admin' => 'System Administration'
              ];
            @endphp
            @foreach($categories as $value => $label)
              <option value="{{ $value }}" {{ old('categoryName') == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
        </div>
      </div>

      {{-- Profile Image --}}
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="profileImage" class="form-label fw-bold">Profile Image <span class="required">*</span></label>
          <div class="row align-items-center g-3">
            <div class="col-md-6">
              <input type="file" name="profile_image" id="profileImage" class="form-control" accept=".jpg,.jpeg" required>
            </div>
            <div class="col-md-3">
              <img src="https://via.placeholder.com/70x70?text=Photo" alt="Profile" class="preview-img" id="profilePreview">
            </div>
            <div class="col-md-12">
              <small class="text-danger d-block">[File Format: *.jpg/.jpeg]</small>
              <div class="invalid-feedback">Profile image is required.</div>
            </div>
          </div>
        </div>
      </div>

      {{-- Status --}}
      <div class="row mb-4">
        <div class="col-md-6">
          <label class="form-label fw-bold">Status <span class="required">*</span></label>
          <div class="d-flex gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="statusActive" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }} required>
              <label class="form-check-label" for="statusActive">Active</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="statusDeactive" value="deactive" {{ old('status') == 'deactive' ? 'checked' : '' }}>
              <label class="form-check-label" for="statusDeactive">Deactive</label>
            </div>
          </div>
        </div>
      </div>

      {{-- Buttons --}}
      <div class="d-flex justify-content-between">
        <a href="/training/list" class="btn btn-secondary">✖ Close</a>
        <button type="submit" class="btn btn-success">✔ Save</button>
      </div>

    </form>
  </div>
</div>

{{-- Scripts --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#overview')).catch(error => console.error(error));
  ClassicEditor.create(document.querySelector('#why_join')).catch(error => console.error(error));
  ClassicEditor.create(document.querySelector('#best_suited_for')).catch(error => console.error(error));
</script>
@endsection
