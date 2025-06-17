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
  .required {
    color: red;
  }
  .is-invalid {
    border-color: #dc3545 !important;
  }
  .invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
  }
  .was-validated .form-control:invalid ~ .invalid-feedback,
  .was-validated .form-select:invalid ~ .invalid-feedback,
  .form-control.is-invalid ~ .invalid-feedback,
  .form-select.is-invalid ~ .invalid-feedback {
    display: block;
  }
</style>


  <div class="border border-success rounded  m-4">
  <div class="form-section-header">
    New Batch
  </div>

  <form class="p-4" enctype="multipart/form-data" method="POST" action="{{ route('batch.store') }}" novalidate id="batchForm">
    @csrf

    <div class="row g-4">
      <!-- Left Column -->
      <div class="col-md-6" style="padding: 20px;">

        {{-- training_id --}}
        <div class="mb-3">
    <label for="training_id" class="form-label fw-bold">
        Training Name <span class="required">*</span>
    </label>
<select id="training_id" name="training_id" class="form-select" required>
    <option value="">Select Training Name</option>
    @foreach($trainings as $training)
        <option value="{{ $training->id }}" data-category="{{ $training->training_category_id }}">
            {{ $training->name }}
        </option>
    @endforeach
</select>
    <div class="invalid-feedback">Please select a training category.</div>
</div>


        {{-- Name of Batch --}}
        <div class="mb-3">
          <label for="name" class="form-label fw-bold">
            Batch Name <span class="required">*</span>
          </label>
          <input 
            type="text" 
            id="name" 
            name="name" 
            class="form-control" 
            value="{{ old('name') }}" 
            placeholder="Enter batch name" 
            required
          >
          <div class="invalid-feedback">Batch name is required.</div>
        </div>

         {{-- Name of Speaker --}}
        <div class="mb-3">
  <label for="speaker_name" class="form-label fw-bold">
    Name of Speaker <span class="required">*</span>
  </label>
  <select 
    id="speaker_name" 
    name="speaker_name" 
    class="form-select select2" 
    required
  >
    <option value="">Select a Speaker</option>







    {{-- Initially no speakers will be shown --}}
  </select>
  <div class="invalid-feedback">Please select the name of the speaker.</div>
</div>

       

        {{-- Start Date --}}
        <div class="mb-3">
          <label for="start_date" class="form-label fw-bold">
            Start Date <span class="required">*</span>
          </label>
          <input 
            type="date" 
            id="start_date" 
            name="start_date" 
            class="form-control" 
            value="{{ old('start_date') }}" 
            required
          >
          <div class="invalid-feedback">Please enter the start date.</div>
        </div>

        {{-- End Date --}}
        <div class="mb-3">
          <label for="end_date" class="form-label fw-bold">
            End Date <span class="required">*</span>
          </label>
          <input 
            type="date" 
            id="end_date" 
            name="end_date" 
            class="form-control" 
            value="{{ old('end_date') }}" 
            required
          >
          <div class="invalid-feedback">Please enter the end date.</div>
        </div>

        {{-- Class Start Time --}}
        <div class="mb-3">
          <label for="start_time" class="form-label fw-bold">
            Class Start Time <span class="required">*</span>
          </label>
          <input 
            type="time" 
            id="start_time" 
            name="start_time" 
            class="form-control" 
            value="{{ old('start_time') }}" 
            required
          >
          <div class="invalid-feedback">Please enter the start time.</div>
        </div>

        {{-- Class End Time --}}
        <div class="mb-3">
          <label for="end_time" class="form-label fw-bold">
            Class End Time <span class="required">*</span>
          </label>
          <input 
            type="time" 
            id="end_time" 
            name="end_time" 
            class="form-control" 
            value="{{ old('end_time') }}" 
            required
          >
          <div class="invalid-feedback">Please enter the end time.</div>
        </div>

        {{-- Class Duration --}}
        <div class="mb-3">
          <label for="class_duration" class="form-label fw-bold">
            Class Duration <span class="required">*</span>
          </label>
          <select 
            id="class_duration" 
            name="class_duration" 
            class="form-select" 
            required
          >
            <option value="">-- Select Duration --</option>
            <option value="30">30 Minutes</option>
            <option value="45">45 Minutes</option>
            <option value="60">1 Hour</option>
            <option value="90">1 Hour 30 Minutes</option>
            <option value="120">2 Hours</option>
          </select>
          <div class="invalid-feedback">Please select the class duration.</div>
        </div>

        {{-- Seat Capacity --}}
        <div class="mb-3">
          <label for="seat_capacity" class="form-label fw-bold">
            Seat Capacity <span class="required">*</span>
          </label>
          <input 
            type="number" 
            id="seat_capacity" 
            name="seat_capacity" 
            class="form-control" 
            value="{{ old('seat_capacity') }}" 
            min="1"
            placeholder="Enter number of seats" 
            required
          >
          <div class="invalid-feedback">Please enter the seat capacity.</div>
        </div>

      </div>

      <!-- Right Column -->
      <div class="col-md-6" style="padding: 20px;">


        {{-- Number of Class/Sessions --}}
        <div class="mb-3">
          <label for="number_of_sessions" class="form-label fw-bold">
            Number of Class/Sessions <span class="required">*</span>
          </label>
          <input 
            type="number" 
            id="number_of_sessions" 
            name="number_of_sessions" 
            class="form-control" 
            value="{{ old('number_of_sessions') }}" 
            min="1" 
            required
          >
          <div class="invalid-feedback">Please enter the number of sessions.</div>
        </div>

        {{-- Total Session Duration --}}
        <div class="mb-3">
          <label class="form-label fw-bold">
            Total Session Duration <span class="required">*</span>
          </label>
          <div class="d-flex gap-2">
            <div class="flex-grow-1">
              <input 
                type="number" 
                id="total_session_hours" 
                name="total_session_hours" 
                class="form-control" 
                value="{{ old('total_session_hours') }}" 
                min="0"
                placeholder="Hours"
                required
              >
              <div class="invalid-feedback">Please enter hours.</div>
            </div>
            <div class="flex-grow-1">
              <input 
                type="number" 
                id="total_session_minutes" 
                name="total_session_minutes" 
                class="form-control" 
                value="{{ old('total_session_minutes') }}" 
                min="0" max="59"
                placeholder="Minutes"
                required
              >
              <div class="invalid-feedback">Please enter minutes (0-59).</div>
            </div>
          </div>
        </div>

        {{-- Enrollment Deadline --}}
        <div class="mb-3">
          <label for="enrollment_deadline" class="form-label fw-bold">
            Enrollment Deadline <span class="required">*</span>
          </label>
          <input 
            type="date" 
            id="enrollment_deadline" 
            name="enrollment_deadline" 
            class="form-control" 
            value="{{ old('enrollment_deadline') }}" 
            required
          >
          <div class="invalid-feedback">Please enter the enrollment deadline.</div>
        </div>

        {{-- Expected Starting Date --}}
        <div class="mb-3">
          <label for="expected_start_date" class="form-label fw-bold">
            Expected Starting Date <span class="required">*</span>
          </label>
          <input 
            type="date" 
            id="expected_start_date" 
            name="expected_start_date" 
            class="form-control" 
            value="{{ old('expected_start_date') }}" 
            required
          >
          <div class="invalid-feedback">Please enter the expected starting date.</div>
        </div>

        {{-- Venue --}}
        <div class="mb-3">
          <label for="venue" class="form-label fw-bold">
            Venue <span class="required">*</span>
          </label>
          <select id="venue" name="venue" class="form-select" required>
            <option value="" disabled selected>Select venue</option>
            <option value="Conference Hall A" {{ old('venue') == 'Conference Hall A' ? 'selected' : '' }}>Conference Hall A</option>
            <option value="Room B202" {{ old('venue') == 'Room B202' ? 'selected' : '' }}>Room B202</option>
            <option value="Auditorium" {{ old('venue') == 'Auditorium' ? 'selected' : '' }}>Auditorium</option>
            <option value="Online" {{ old('venue') == 'Online' ? 'selected' : '' }}>Online</option>
          </select>
          <div class="invalid-feedback">Please select a venue.</div>
        </div>

        {{-- Session Day --}}
        <div class="mb-3">
          <label for="session_day" class="form-label fw-bold">
            Session Day <span class="required">*</span>
          </label>
          <select id="session_day" name="session_day" class="form-select" required>
            <option value="" disabled selected>Select session day</option>
            <option value="Monday" {{ old('session_day') == 'Monday' ? 'selected' : '' }}>Monday</option>
            <option value="Tuesday" {{ old('session_day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
            <option value="Wednesday" {{ old('session_day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
            <option value="Thursday" {{ old('session_day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
            <option value="Friday" {{ old('session_day') == 'Friday' ? 'selected' : '' }}>Friday</option>
            <option value="Saturday" {{ old('session_day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
            <option value="Sunday" {{ old('session_day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
          </select>
          <div class="invalid-feedback">Please select a session day.</div>
        </div>

        {{-- Visible Platform --}}
        <div class="mb-3">
          <label for="visible_platform" class="form-label fw-bold">
            Visible Platform <span class="required">*</span>
          </label>
          <select id="visible_platform" name="visible_platform" class="form-select" required>
            <option value="" disabled selected>Select platform</option>
            <option value="web" {{ old('visible_platform') == 'web' ? 'selected' : '' }}>Web</option>
            <option value="mobile" {{ old('visible_platform') == 'mobile' ? 'selected' : '' }}>Mobile</option>
            <option value="both" {{ old('visible_platform') == 'both' ? 'selected' : '' }}>Both</option>
          </select>
          <div class="invalid-feedback">Please select a visible platform.</div>
        </div>

        {{-- Batch Status --}}
        <div class="mb-3">
          <label for="batch_status" class="form-label fw-bold">
            Status <span class="required">*</span>
          </label>
          <select 
            id="batch_status" 
            name="batch_status" 
            class="form-select" 
            required
          >
            <option value="" disabled {{ old('batch_status') ? '' : 'selected' }}>Select status</option>
            <option value="1" {{ old('batch_status') == '1' ? 'selected' : '' }}>On Going</option>
            <option value="0" {{ old('batch_status') == '0' ? 'selected' : '' }}>Completed</option>
          </select>
          <div class="invalid-feedback">Please select a batch status.</div>
        </div>

        {{-- Publication Status --}}
        <div class="mb-3">
          <label for="publication_status" class="form-label fw-bold">
            Publication Status <span class="required">*</span>
          </label>
          <select 
            id="publication_status" 
            name="publication_status" 
            class="form-select" 
            required
          >
            <option value="" disabled {{ old('publication_status') ? '' : 'selected' }}>Select status</option>
            <option value="1" {{ old('publication_status') == '1' ? 'selected' : '' }}>Published</option>
            <option value="0" {{ old('publication_status') == '0' ? 'selected' : '' }}>Unpublished</option>
          </select>
          <div class="invalid-feedback">Please select the publication status.</div>
        </div>

      </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 d-flex justify-content-between">
      <a href="/batch/list" class="btn btn-secondary">✖ Close</a>
      <button type="submit" class="btn btn-success">Save</button>
    </div>

  </form>
</div>


<script>

document.addEventListener('DOMContentLoaded', function () {
    const trainingSelect = document.getElementById('training_id');
    const speakerSelect = document.getElementById('speaker_name');
    
    // Store all speakers data
    const allSpeakers = @json($speakers);
    
    trainingSelect.addEventListener('change', function () {
        const selectedCategoryId = this.selectedOptions[0]?.dataset.category;
        
        // Clear speaker options
        speakerSelect.innerHTML = '<option value="">Select a Speaker</option>';
        
        // If no training selected, don't show any speakers
        if (!selectedCategoryId) {
            return;
        }
        
        // Filter and add speakers based on selected training category
        allSpeakers.forEach(speaker => {
            const categories = speaker.exparties_categories_id || [];
            if (categories.includes(selectedCategoryId)) {
                const option = document.createElement('option');
                option.value = speaker.id;
                option.textContent = speaker.name;
                option.setAttribute('data-categories', JSON.stringify(categories));
                speakerSelect.appendChild(option);
            }
        });
    });
    
    // Initially clear speakers when page loads
    speakerSelect.innerHTML = '<option value="">Select a Speaker</option>';
});


document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('batchForm');
  
  // Add event listener for form submission
  form.addEventListener('submit', function(event) {
    // Check form validity
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
      
      // Add was-validated class to show validation messages
      form.classList.add('was-validated');
      
      // Manually check each field and add/remove is-invalid class
      const fields = form.querySelectorAll('input, select, textarea');
      fields.forEach(field => {
        if (!field.checkValidity()) {
          field.classList.add('is-invalid');
        } else {
          field.classList.remove('is-invalid');
        }
      });
    }
  });
  
  // Add real-time validation on blur
  const fields = form.querySelectorAll('input, select, textarea');
  fields.forEach(field => {
    field.addEventListener('blur', function() {
      if (!this.checkValidity()) {
        this.classList.add('is-invalid');
      } else {
        this.classList.remove('is-invalid');
      }
    });
    
    // For select elements, validate on change
    if (field.tagName === 'SELECT') {
      field.addEventListener('change', function() {
        if (!this.checkValidity()) {
          this.classList.add('is-invalid');
        } else {
          this.classList.remove('is-invalid');
        }
      });
    }
  });
  
  // Custom validation for date fields
  const startDate = document.getElementById('start_date');
  const endDate = document.getElementById('end_date');
  
  if (startDate && endDate) {
    startDate.addEventListener('change', validateDates);
    endDate.addEventListener('change', validateDates);
    
    function validateDates() {
      if (startDate.value && endDate.value) {
        if (new Date(startDate.value) > new Date(endDate.value)) {
          endDate.setCustomValidity('End date must be after start date');
          endDate.classList.add('is-invalid');
        } else {
          endDate.setCustomValidity('');
          endDate.classList.remove('is-invalid');
        }
      }
    }
  }
  
  // Custom validation for time fields
  const startTime = document.getElementById('start_time');
  const endTime = document.getElementById('end_time');
  
  if (startTime && endTime) {
    startTime.addEventListener('change', validateTimes);
    endTime.addEventListener('change', validateTimes);
    
    function validateTimes() {
      if (startTime.value && endTime.value) {
        if (startTime.value >= endTime.value) {
          endTime.setCustomValidity('End time must be after start time');
          endTime.classList.add('is-invalid');
        } else {
          endTime.setCustomValidity('');
          endTime.classList.remove('is-invalid');
        }
      }
    }
  }
});
</script>


@endsection