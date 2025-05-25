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
  .is-invalid {
    border-color: #dc3545 !important;
    background-color: #fff5f5 !important;
  }
</style>

<div class=" border border-success rounded" style="margin: 20px">
  <div class="form-section-header">
    Add Speaker Information
  </div>

  <!-- Display Validation Errors -->


  <form class="p-4" enctype="multipart/form-data" method="POST" action="{{ route('speakers.store') }}">
    @csrf
    <div class="row g-3">
      <!-- Left Column -->
      <div class="col-md-6">
        <label class="form-label">Name <span class="required">*</span></label>
        <div class="input-group">


          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name" value="{{ old('name') }}">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>
        @error('name')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Mobile No <span class="required">*</span></label>
        <div class="input-group">


          <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter mobile number" value="{{ old('phone') }}">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>
        @error('phone')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Designation <span class="required">*</span></label>
        <div class="input-group">


          <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Enter designation" value="{{ old('designation') }}">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>
        @error('designation')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Profile Image <span class="required">*</span></label>
        <div class="d-flex align-items-center">


          <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" accept=".jpg,.jpeg">
          <img src="https://via.placeholder.com/70x70?text=Photo" alt="Profile" class="preview-img">
          <div class="form-check form-switch ms-3">
            <input class="form-check-input" type="checkbox" checked>
          </div>
        </div>
        <small class="text-danger">[File Format: *.jpg/.jpeg]</small>
        @error('profile_image')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <div class="mt-4">
          <label class="form-label">Status <span class="required">*</span>:</label>
          <div>
            <div class="form-check form-check-inline">


              <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="active" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
              <label class="form-check-label" for="active">Active</label>
            </div>
            <div class="form-check form-check-inline">


              <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="inactive" value="inactive" {{ old('status') == 'inactive' ? 'checked' : '' }}>
              <label class="form-check-label" for="inactive">Inactive</label>
            </div>
          </div>
          @error('status')
            <div class="text-danger small">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <label class="form-label">Email <span class="required">*</span></label>
        <div class="input-group">


          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address" value="{{ old('email') }}">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>
        @error('email')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Gender <span class="required">*</span></label>


        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
          <option value="" selected>Select Gender</option>



          <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Organization <span class="required">*</span></label>


        <input type="text" name="organization" class="form-control @error('organization') is-invalid @enderror" placeholder="Enter organization name" value="{{ old('organization') }}">
        @error('organization')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Signature <span class="required">*</span></label>
        <div class="d-flex align-items-center">


          <input type="file" name="signature" class="form-control @error('signature') is-invalid @enderror" accept=".jpg,.jpeg,.png">
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
        @error('signature')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <label class="form-label mt-3">Link</label>
        <div class="input-group">


          <input type="url" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="Enter website/social media link" value="{{ old('link') }}">
          <span class="input-group-text">
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" checked>
            </div>
          </span>
        </div>
        @error('link')
          <div class="text-danger small">{{ $message }}</div>
        @enderror
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
