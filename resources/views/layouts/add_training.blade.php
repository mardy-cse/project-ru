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
  
  /* Enhanced textarea styling */
  .form-control[rows] {
    border-radius: 8px;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
    font-size: 14px;
    line-height: 1.5;
    padding: 12px 15px;
  }
  
  .form-control[rows]:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    background-color: #f8fffe;
  }
  
  .form-control[rows]:hover {
    border-color: #10b981;
  }
  
  /* CKEditor specific styling */
  .ck-editor__editable {
    min-height: 150px !important;
    border-radius: 8px !important;
    border: 2px solid #e2e8f0 !important;
    transition: all 0.3s ease !important;
  }
  
  .ck-editor__editable:focus {
    border-color: #10b981 !important;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
  }
  
  .ck-toolbar {
    border-radius: 8px 8px 0 0 !important;
    border: 2px solid #e2e8f0 !important;
    border-bottom: 1px solid #e2e8f0 !important;
  }
  
  .ck-editor {
    margin-bottom: 1rem;
  }
  
  #statusError {
    display: none;
    color: #dc3545;
    font-size: 0.875em;
    margin-top: 0.25rem;
  }
</style>

<div class="border border-success rounded m-4">
  <div class="form-section-header">Training Information</div>

  <div class="p-4">
    <form method="POST" action="{{ route('training.store') }}" enctype="multipart/form-data" novalidate id="trainingForm" >
      @csrf

      {{-- Title --}}
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="name" class="form-label fw-bold">Title <span class="required">*</span></label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Training Name" required>
          <div class="invalid-feedback">Please provide a valid title.</div>
        </div>
      </div>

      {{-- Overview --}}
      <div class="mb-3">
        <label for="training_overview" class="form-label fw-bold">Overview <span class="required">*</span></label>
        <textarea id="training_overview" name="training_overview" class="form-control" rows="6" style="min-height: 120px; resize: vertical;" required></textarea>
        <div class="invalid-feedback">Overview is required.</div>
      </div>

      {{-- Why Join --}}
      <div class="mb-3">
        <label for="training_objective" class="form-label fw-bold">Why Join <span class="required">*</span></label>
        <textarea id="training_objective" name="training_objective" class="form-control" rows="6" style="min-height: 120px; resize: vertical;" required></textarea>
        <div class="invalid-feedback">Please tell why to join.</div>
      </div>

      {{-- Best Suited For --}}
      <div class="mb-3">
        <label for="course_qualification" class="form-label fw-bold">This Course is Best Suited For <span class="required">*</span></label>
        <textarea id="course_qualification" name="course_qualification" class="form-control" rows="6" style="min-height: 120px; resize: vertical;" required></textarea>
        <div class="invalid-feedback">Please specify best suited for.</div>
      </div>

      {{-- Category --}}
      {{-- <div class="row mb-3">
  <div class="col-md-6">
    <label for="training_category_id" class="form-label fw-bold">Category Name <span class="required">*</span></label>
    <select name="training_category_id" id="training_category_id" class="form-select" required>
      <option value="">Select Category</option>
      @php
        $categories = [
          1 => 'Web Development',
          2 => 'App Development',
          3 => 'Data Science',
          4 => 'Machine Learning',
          5 => 'Cybersecurity',
          6 => 'Cloud Computing',
          7 => 'DevOps',
          8 => 'Networking',
          9 => 'System Administration'
        ];
      @endphp
      @foreach($categories as $id => $label)
        <option value="{{ $id }}" {{ old('training_category_id') == $id ? 'selected' : '' }}>
          {{ $label }}
        </option>
      @endforeach
    </select>
    <div class="invalid-feedback">Please select a category.</div>
  </div>
</div> --}}

<div class="mb-3">
    <label for="training_category_id" class="form-label fw-bold">
        Training Category <span class="text-danger">*</span>
    </label>
    <select name="training_category_id" id="training_category_id" class="form-select" required>
        <option value="">Select a Category</option>
        @foreach ($trainingCategory as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>
</div>


      {{-- Profile Image --}}
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="course_thumbnail" class="form-label fw-bold">Profile Image <span class="required">*</span></label>
          <div class="row align-items-center g-3">
            <div class="col-md-6">
              <input type="file" name="course_thumbnail" id="course_thumbnail" class="form-control" accept="image/*" required>
              <div class="invalid-feedback">Please upload a profile image (jpg/jpeg).</div>
            </div>
            <div class="col-md-3">
              {{-- <img src="https://via.placeholder.com/70x70?text=Photo" alt="Profile" class="preview-img" id="profilePreview"> --}}
              <img src="{{ asset('images/no-image-found.png') }}" alt="Profile" class="preview-img" id="profilePreview">
            </div>
            <div class="col-md-12">
              <small class="text-danger d-block">[File Format: *.jpg/.jpeg]</small>
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
        <input
          class="form-check-input"
          type="radio"
          name="status"
          id="statusActive"
          value="1"
          {{ old('status', '1') == '1' ? 'checked' : '' }}
          required
        >
        <label class="form-check-label" for="statusActive">Active</label>
      </div>
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="status"
          id="statusDeactive"
          value="0"
          {{ old('status') === '0' ? 'checked' : '' }}
          required
        >
        <label class="form-check-label" for="statusDeactive">Deactive</label>
      </div>
    </div>
    <div id="statusError">Please select a status.</div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

<script>
  // Initialize CKEditors and keep references
  let editors = {};
  ['training_overview', 'training_objective', 'course_qualification'].forEach(id => {
    ClassicEditor.create(document.querySelector('#' + id), {
      // Configure editor height and other settings
      toolbar: {
        items: [
          'heading', '|',
          'bold', 'italic', 'link', '|',
          'bulletedList', 'numberedList', '|',
          'outdent', 'indent', '|',
          'blockQuote', 'insertTable', '|',
          'undo', 'redo'
        ]
      },
      // Set minimum height for the editing area
      height: '200px',
      // Additional configuration
      placeholder: id === 'training_overview' ? 'Enter detailed overview of the training...' :
                  id === 'training_objective' ? 'Explain why students should join this training...' :
                  'Describe who should take this course...'
    })
      .then(editor => { 
        editors[id] = editor;
        // Set minimum height for the editable area
        editor.editing.view.change(writer => {
          writer.setStyle('min-height', '180px', editor.editing.view.document.getRoot());
        });
      })
      .catch(error => console.error(error));
  });

  // Image preview for file input
  $('#course_thumbnail').on('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => $('#profilePreview').attr('src', e.target.result);
      reader.readAsDataURL(file);
    } else {
      $('#profilePreview').attr('src', 'https://via.placeholder.com/70x70?text=Photo');
    }
  });

  (function () {
    'use strict'

    var form = document.querySelector('#trainingForm')

    form.addEventListener('submit', function (event) {
      // Reset all previous validation states for CKEditor fields
      ['training_overview','training_objective','course_qualification'].forEach(id => {
        document.getElementById(id).classList.remove('is-invalid');
      });
      $('#statusError').hide();

      // Get CKEditor content and strip HTML to validate non-empty
      const stripHtml = (html) => {
        let div = document.createElement('div');
        div.innerHTML = html;
        return div.textContent || div.innerText || "";
      };

      let valid = true;

      for (const id of ['training_overview','training_objective','course_qualification']) {
        let data = editors[id] ? editors[id].getData() : document.getElementById(id).value;
        if (!stripHtml(data).trim()) {
          document.getElementById(id).classList.add('is-invalid');
          valid = false;
        }
      }

      // Validate status radio manually
      let statusChecked = form.querySelector('input[name="status"]:checked');
      if (!statusChecked) {
        $('#statusError').show();
        valid = false;
      }

      // Let browser validate other inputs (e.g. required text inputs, file inputs)
      if (!form.checkValidity()) {
        valid = false;
      }

      if (!valid) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.classList.add('was-validated')
    }, false)
  })()
</script>
@endsection
