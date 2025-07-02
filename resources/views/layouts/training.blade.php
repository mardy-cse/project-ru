@extends('dashboard')

@section('content')
<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
  <div class="max-w-7xl mx-auto">


    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
  <div class="px-6 py-2 border-b border-gray-200 bg-green-200" style="background-color: green; color: white;">
    <div class="flex justify-between items-center">
      <!-- Left side: icon + title -->
      <div class="flex items-center gap-2">
        <!-- Hamburger icon -->
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: white;">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <h4 class="text-xl font-bold text-gray-900" style="color:white">Training List</h4>
      </div>

      <!-- Right side: button -->
    <a href="/training/add_training" style="text-decoration: none;">
  <button class="px-6 py-2 rounded-xl flex items-center gap-2 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-black font-semibold border-2 border-gray-300 hover:border-gray-400 bg-white">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    <span class="font-semibold">Add New Training</span>
  </button>
</a>

    </div>
  </div>
</div>


      
      <div class="overflow-x-auto p-6">
        @include('layouts.training_data_table')
      </div>
    </div>
  </div>
</div>


<!-- DataTables JavaScript -->
<script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

<script>
// Initialize DataTable
$(document).ready(function() {
    let table = new DataTable('#myTable', {
        responsive: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            search: "Search speakers:",
            lengthMenu: "Show _MENU_ speakers per page",
            info: "Showing _START_ to _END_ of _TOTAL_ speakers",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});

function openAddModal() {
    document.getElementById('addSpeakerModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addSpeakerModal').classList.add('hidden');
}

function viewSpeaker(id) {
    alert('View speaker: ' + id);
}

function editSpeaker(id) {
    alert('Edit speaker: ' + id);
}

function deleteSpeaker(id) {
    if(confirm('Are you sure you want to delete this speaker?')) {
        alert('Delete speaker: ' + id);
    }
}

// Function to show image modal when thumbnail is clicked
function showImageModal(imageSrc, trainingName) {
    // Create enhanced modal HTML with professional styling and improved UX
    const modalHtml = `
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" data-bs-backdrop="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content shadow-lg border-0" style="border-radius: 20px; overflow: hidden; background: transparent;">
                    <!-- Header with gradient background -->
                    <div class="modal-header border-0 text-white position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 1.5rem 2rem; border-radius: 20px 20px 0 0;">
                        <h5 class="modal-title fw-bold d-flex align-items-center" id="imageModalLabel">
                            <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image text-white" style="font-size: 16px;"></i>
                            </div>
                            <span style="font-size: 1.2rem;">${trainingName} - Training Thumbnail</span>
                        </h5>
                        <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" 
                                style="top: 20px; right: 20px; background: rgba(255,255,255,0.2); border-radius: 50%; padding: 10px; backdrop-filter: blur(10px); filter: brightness(0) invert(1); opacity: 0.8; transition: all 0.3s ease;"
                                onmouseover="this.style.opacity='1'; this.style.background='rgba(255,255,255,0.3)'"
                                onmouseout="this.style.opacity='0.8'; this.style.background='rgba(255,255,255,0.2)'"></button>
                    </div>
                    
                    <!-- Body with image -->
                    <div class="modal-body p-0 position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 500px;">
                        <!-- Loading spinner -->
                        <div class="loading-spinner position-absolute top-50 start-50 translate-middle" id="imageLoadingSpinner">
                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        
                        <!-- Image container -->
                        <div class="image-container d-flex align-items-center justify-content-center w-100 h-100 p-4" style="min-height: 500px;">
                            <div class="image-wrapper position-relative" style="max-width: 100%; max-height: 600px;">
                                <img src="${imageSrc}" 
                                     alt="${trainingName} Training Thumbnail" 
                                     class="img-fluid shadow-lg" 
                                     style="max-height: 580px; max-width: 100%; border-radius: 15px; object-fit: contain; transition: all 0.4s ease; opacity: 0; transform: scale(0.9);"
                                     onload="this.style.opacity='1'; this.style.transform='scale(1)'; document.getElementById('imageLoadingSpinner').style.display='none';"
                                     onerror="this.src='{{ asset('images/no-image-found.png') }}'; this.style.opacity='1'; this.style.transform='scale(1)'; document.getElementById('imageLoadingSpinner').style.display='none';">
                                
                                <!-- Image overlay with info on hover -->
                                <div class="image-overlay position-absolute bottom-0 start-0 end-0 p-3 text-white text-center" 
                                     style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); border-radius: 0 0 15px 15px; opacity: 0; transition: opacity 0.3s ease;">
                                    <small><i class="fas fa-expand-arrows-alt me-1"></i>Training Thumbnail Preview</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Footer with actions -->
                    <div class="modal-footer border-0 d-flex justify-content-between align-items-center" style="background: white; padding: 1.5rem 2rem; border-radius: 0 0 20px 20px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-info-circle text-muted" style="font-size: 14px;"></i>
                            </div>
                            <small class="text-muted">Click outside the modal or press ESC to close</small>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="downloadImage('${imageSrc}', '${trainingName}')">
                                <i class="fas fa-download me-1"></i>Download
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i>Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Remove existing modal if any
    const existingModal = document.getElementById('imageModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Add modal to body
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Initialize and show modal with enhanced options
    const modalElement = document.getElementById('imageModal');
    const modal = new bootstrap.Modal(modalElement, {
        backdrop: true,
        keyboard: true,
        focus: true
    });
    
    // Show modal with fade-in animation
    modal.show();
    
    // Add image hover effect
    modalElement.addEventListener('shown.bs.modal', function () {
        const imageWrapper = modalElement.querySelector('.image-wrapper');
        const imageOverlay = modalElement.querySelector('.image-overlay');
        
        if (imageWrapper && imageOverlay) {
            imageWrapper.addEventListener('mouseenter', function() {
                imageOverlay.style.opacity = '1';
            });
            
            imageWrapper.addEventListener('mouseleave', function() {
                imageOverlay.style.opacity = '0';
            });
        }
    });
    
    // Clean up modal when hidden
    modalElement.addEventListener('hidden.bs.modal', function () {
        modalElement.remove();
    });
}

// Function to download image
function downloadImage(imageSrc, trainingName) {
    const link = document.createElement('a');
    link.href = imageSrc;
    link.download = `${trainingName.replace(/[^a-z0-9]/gi, '_').toLowerCase()}_thumbnail.jpg`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Image preview functionality
document.getElementById('profile_image')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('imagePlaceholder').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection