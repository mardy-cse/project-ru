@extends('dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .form-section-header {
    background-color: green;
    color: white;
    padding: 12px 20px;
    font-weight: bold;
    /* border-top-left-radius: 10px;
    border-top-right-radius: 10px; */
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
</style>

<div class=" border border-success rounded" style="margin: 20px">
  <div class="form-section-header">
    Add Speaker Information
  </div>

  <form class="p-4">
    <div class="row g-3">
      <!-- Left Column -->
      <div class="col-md-6">
        <label class="form-label">Name <span class="required">*</span></label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Enter full name">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>

        <label class="form-label mt-3">Mobile No <span class="required">*</span></label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Enter mobile number">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>

        <label class="form-label mt-3">Designation <span class="required">*</span></label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Enter designation">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>

        <label class="form-label mt-3">Profile Image <span class="required">*</span></label>
        <div class="d-flex align-items-center">
          <input type="file" class="form-control" accept=".jpg,.jpeg">
          <img src="https://via.placeholder.com/70x70?text=Photo" alt="Profile" class="preview-img">
          <div class="form-check form-switch ms-3">
            <input class="form-check-input" type="checkbox" checked>
          </div>
        </div>
        <small class="text-danger">[File Format: *.jpg/.jpeg]</small>

        <div class="mt-4">
          <label class="form-label">Status <span class="required">*</span>:</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="active" checked>
              <label class="form-check-label" for="active">Active</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inactive">
              <label class="form-check-label" for="inactive">Inactive</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <label class="form-label">Email <span class="required">*</span></label>
        <div class="input-group">
          <input type="email" class="form-control" placeholder="Enter email address">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>

        <label class="form-label mt-3">Gender <span class="required">*</span></label>
        <select class="form-select">
          <option value="" selected>Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        <label class="form-label mt-3">Organization <span class="required">*</span></label>
        <input type="text" class="form-control" placeholder="Enter organization name">

        <label class="form-label mt-3">Signature <span class="required">*</span></label>
        <div class="d-flex align-items-center">
          <input type="file" class="form-control" accept=".jpg,.jpeg,.png">
          <img src="https://via.placeholder.com/80x40?text=Sign" alt="Signature" class="preview-img ms-2">
          <div class="form-check form-switch ms-3">
            <input class="form-check-input" type="checkbox" checked>
          </div>
        </div>
        <small class="text-danger d-block">
          [File Format: *.jpg/.jpeg/.png]<br>
          [File Size: <100KB]<br>
          [File Dimension: Height: 80, Width: 300]
        </small>

        <label class="form-label mt-3">Link</label>
        <div class="input-group">
          <input type="url" class="form-control" placeholder="Enter website/social media link">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 d-flex justify-content-between">
      <a href="/speaker_content">
        <button type="button" class="btn btn-secondary">✖ Close</button>
      </a>
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </form>
</div>

@endsection
