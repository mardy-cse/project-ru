@extends('dashboard')

@section('content')
<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

<style>
  .designation-text {
    word-wrap: break-word;
    max-width: 200px;
  }
  
  .profile-image-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .profile-image-container img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 2px solid #e0e0e0;
  }
  
  .profile-image-container img:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    border-color: #007bff;
  }
  
  #myTable td {
    vertical-align: middle;
    padding: 12px 8px;
  }
  
  #myTable th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    font-weight: 600;
    border-bottom: 2px solid #dee2e6;
    color: #495057;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.5px;
    padding: 15px 8px;
  }
  
  #myTable tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f1f3f5;
  }
  
  #myTable tbody tr:hover {
    background-color: #f8f9ff;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.1);
  }
  
  /* Status badge improvements */
  .badge {
    font-size: 0.75rem;
    padding: 0.4rem 0.8rem;
    border-radius: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  /* Action button improvements */
  .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.8rem;
    border-radius: 6px;
    transition: all 0.2s ease;
  }
  
  .btn-sm:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  
  /* Responsive adjustments */
  @media (max-width: 768px) {
    #myTable {
      font-size: 12px;
    }
    
    .profile-image-container img {
      width: 40px !important;
      height: 40px !important;
    }
    
    .designation-text {
      max-width: 120px;
    }
  }
  
  @media (max-width: 576px) {
    #myTable {
      font-size: 11px;
    }
    
    .profile-image-container img {
      width: 35px !important;
      height: 35px !important;
    }
  }
  
  /* Modal image styling with enhanced animations */
  .modal-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.4s ease;
  }
  
  /* Enhanced modal styling with modern animations */
  .modal-content {
    animation: modalSlideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: none !important;
    overflow: hidden;
  }
  
  @keyframes modalSlideIn {
    from {
      opacity: 0;
      transform: translateY(-50px) scale(0.9);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }
  
  /* Custom backdrop styling */
  .modal-backdrop {
    transition: all 0.3s ease;
    backdrop-filter: blur(8px);
  }
  
  /* Enhanced image container with better loading state */
  .image-container {
    position: relative;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    min-height: 400px;
  }
  
  /* Improved loading spinner */
  .loading-spinner {
    z-index: 10;
  }
  
  /* Fullscreen image styles */
  .fullscreen-image {
    transition: all 0.3s ease !important;
    cursor: zoom-out !important;
  }
  
  /* Image wrapper enhancements */
  .image-wrapper {
    transition: transform 0.3s ease;
  }
  
  .image-wrapper:hover {
    transform: translateY(-2px);
  }
  
  /* Custom scrollbar for modal */
  .modal-body::-webkit-scrollbar {
    width: 8px;
  }
  
  .modal-body::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
  }
  
  .modal-body::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
  }
  
  .modal-body::-webkit-scrollbar-thumb:hover {
    background: #555;
  }
  
  /* Enhanced button styles in modal */
  .modal-footer .btn {
    transition: all 0.3s ease;
    border-radius: 8px;
    font-weight: 500;
  }
  
  .modal-footer .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  }
  
  /* Profile image in table hover effects */
  .profile-image-container img {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid #e0e0e0;
    cursor: pointer;
  }
  
  .profile-image-container img:hover {
    transform: scale(1.15) rotate(2deg);
    box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    border-color: #667eea;
    z-index: 5;
    position: relative;
  }
  
  /* Add ripple effect on image click */
  .profile-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    display: inline-block;
  }
  
  .ripple {
    position: absolute;
    border-radius: 50%;
    background-color: rgba(102, 126, 234, 0.4);
    transform: scale(0);
    animation: ripple-animation 0.6s linear;
    pointer-events: none;
  }
  
  @keyframes ripple-animation {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
  
  .profile-image-container::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(102, 126, 234, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
    pointer-events: none;
    z-index: 1;
  }
  
  .profile-image-container:active::before {
    width: 120px;
    height: 120px;
  }
  
  /* Responsive modal adjustments */
  @media (max-width: 768px) {
    .modal-xl {
      margin: 10px;
    }
    
    .modal-content {
      border-radius: 15px;
    }
    
    .modal-header {
      padding: 1rem 1.5rem;
      border-radius: 15px 15px 0 0 !important;
    }
    
    .modal-footer {
      padding: 1rem 1.5rem;
      flex-direction: column;
      gap: 10px;
      align-items: stretch;
    }
    
    .image-container {
      min-height: 300px;
      padding: 1rem;
    }
    
    .modal-title {
      font-size: 1rem !important;
    }
    
    .profile-image-container img {
      width: 40px !important;
      height: 40px !important;
    }
  }
  
  @media (max-width: 576px) {
    .modal-xl {
      margin: 5px;
    }
    
    .image-container {
      min-height: 250px;
      padding: 0.5rem;
    }
    
    .profile-image-container img {
      width: 35px !important;
      height: 35px !important;
    }
    
    .modal-footer .btn {
      font-size: 0.875rem;
      padding: 0.5rem 1rem;
    }
  }
  
  .d-flex {
    display: flex !important;
  }
  
  .align-items-center {
    align-items: center !important;
  }
  
  .justify-content-between {
    justify-content: space-between !important;
  }
  
  .text-center {
    text-align: center !important;
  }
  
  .ms-2 {
    margin-left: 0.5rem !important;
  }
</style>

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
        <h4 class="text-xl font-bold text-gray-900" style="color:white">Speaker List</h4>
      </div>

      <!-- Right side: button -->
    <a href="/speaker/add_new" style="text-decoration: none;">
  <button class="px-6 py-2 rounded-xl flex items-center gap-2 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-black font-semibold border-2 border-gray-300 hover:border-gray-400 bg-white">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    <span class="font-semibold">Add New</span>
  </button>
</a>

    </div>
  </div>
</div>


      
      <div class="overflow-x-auto p-6">
        @include('layouts.speaker_data_table')
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
        columnDefs: [
            { 
                targets: [5], // Profile Image column
                orderable: false,
                searchable: false,
                className: 'text-center align-middle',
                width: '80px'
            },
            { 
                targets: [4], // Designation column
                className: 'text-left align-middle',
                width: '200px',
                render: function(data, type, row) {
                    if (type === 'display' && data.length > 30) {
                        return '<span title="' + data + '">' + data.substr(0, 30) + '...</span>';
                    }
                    return data;
                }
            },
            { 
                targets: [7], // Action column
                orderable: false,
                searchable: false,
                className: 'text-center align-middle',
                width: '150px'
            },
            {
                targets: [1], // Name column
                className: 'align-middle',
                render: function(data, type, row) {
                    if (type === 'display' && data.length > 20) {
                        return '<span title="' + data + '" class="fw-semibold">' + data.substr(0, 20) + '...</span>';
                    }
                    return '<span class="fw-semibold">' + data + '</span>';
                }
            },
            {
                targets: [2], // Email column
                className: 'align-middle',
                render: function(data, type, row) {
                    if (type === 'display' && data.length > 25) {
                        return '<span title="' + data + '">' + data.substr(0, 25) + '...</span>';
                    }
                    return data;
                }
            }
        ],
        language: {
            search: "Search speakers:",
            lengthMenu: "Show _MENU_ speakers per page",
            info: "Showing _START_ to _END_ of _TOTAL_ speakers",
            infoEmpty: "No speakers available",
            infoFiltered: "(filtered from _MAX_ total speakers)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            },
            emptyTable: "No speakers found in the database"
        },
        order: [[1, 'asc']], // Sort by name column by default
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
        initComplete: function() {
            // Add some styling to the DataTable controls
            $('.dataTables_filter input').addClass('form-control form-control-sm');
            $('.dataTables_length select').addClass('form-select form-select-sm');
            
            // Initialize tooltips for profile images
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    });
    
    // Preload profile images for better modal performance
    const profileImages = document.querySelectorAll('.profile-image-container img');
    profileImages.forEach(img => {
        preloadImage(img.src).catch(err => {
            console.log('Failed to preload image:', img.src);
        });
    });
    
    // Add click animation to profile images
    profileImages.forEach(img => {
        img.addEventListener('click', function(e) {
            addRippleEffect(this.parentElement, e);
        });
    });
    
    // Add hover tooltips for profile images
    profileImages.forEach(img => {
        img.setAttribute('data-bs-toggle', 'tooltip');
        img.setAttribute('data-bs-placement', 'top');
        img.setAttribute('data-bs-title', 'Click to view full image');
    });
});

// Function to show image modal when profile image is clicked
function showImageModal(imageSrc, speakerName) {
    // Create enhanced modal HTML with professional styling and improved UX
    const modalHtml = `
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" data-bs-backdrop="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content shadow-lg border-0" style="border-radius: 20px; overflow: hidden; background: transparent;">
                    <!-- Header with gradient background -->
                    <div class="modal-header border-0 text-white position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 1.5rem 2rem; border-radius: 20px 20px 0 0;">
                        <h5 class="modal-title fw-bold d-flex align-items-center" id="imageModalLabel">
                            <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user text-white" style="font-size: 16px;"></i>
                            </div>
                            <span style="font-size: 1.2rem;">${speakerName}'s Profile Image</span>
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
                                     alt="${speakerName} Profile Image" 
                                     class="img-fluid shadow-lg" 
                                     style="max-height: 580px; max-width: 100%; border-radius: 15px; object-fit: contain; transition: all 0.4s ease; opacity: 0; transform: scale(0.9);"
                                     onload="this.style.opacity='1'; this.style.transform='scale(1)'; document.getElementById('imageLoadingSpinner').style.display='none';"
                                     onerror="this.src='https://via.placeholder.com/400x400/6c757d/ffffff?text=Image+Not+Available'; this.style.opacity='1'; this.style.transform='scale(1)'; document.getElementById('imageLoadingSpinner').style.display='none';">
                                
                                <!-- Image overlay with info on hover -->
                                <div class="image-overlay position-absolute bottom-0 start-0 end-0 p-3 text-white text-center" 
                                     style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); border-radius: 0 0 15px 15px; opacity: 0; transition: opacity 0.3s ease;">
                                    <small><i class="fas fa-expand-arrows-alt me-1"></i>Click and drag to move • Scroll to zoom</small>
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
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="downloadImage('${imageSrc}', '${speakerName}')">
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
    
    // Enhanced modal event listeners
    modalElement.addEventListener('shown.bs.modal', function() {
        // Style the backdrop
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            backdrop.style.backdropFilter = 'blur(5px)';
            backdrop.style.transition = 'all 0.3s ease';
        }
        
        // Add image hover effects
        const img = modalElement.querySelector('img');
        const overlay = modalElement.querySelector('.image-overlay');
        
        if (img && overlay) {
            img.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                overlay.style.opacity = '1';
            });
            img.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                overlay.style.opacity = '0';
            });
            
            // Add click event for full-screen view
            img.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleImageFullscreen(this);
            });
        }
    });
    
    // Show modal with smooth animation
    modal.show();
    
    // Clean up modal after hiding
    modalElement.addEventListener('hidden.bs.modal', function () {
        this.remove();
    });
}

// Function to download image
function downloadImage(imageSrc, speakerName) {
    try {
        const link = document.createElement('a');
        link.href = imageSrc;
        link.download = `${speakerName.replace(/[^a-zA-Z0-9]/g, '_')}_profile_image.jpg`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    } catch (error) {
        // Fallback for Base64 images
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const img = new Image();
        img.crossOrigin = 'anonymous';
        img.onload = function() {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);
            
            canvas.toBlob(function(blob) {
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = `${speakerName.replace(/[^a-zA-Z0-9]/g, '_')}_profile_image.jpg`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(url);
            });
        };
        img.src = imageSrc;
    }
}

// Function to toggle fullscreen view of image
function toggleImageFullscreen(imgElement) {
    const isFullscreen = imgElement.classList.contains('fullscreen-image');
    
    if (!isFullscreen) {
        // Enter fullscreen mode
        imgElement.classList.add('fullscreen-image');
        imgElement.style.position = 'fixed';
        imgElement.style.top = '0';
        imgElement.style.left = '0';
        imgElement.style.width = '100vw';
        imgElement.style.height = '100vh';
        imgElement.style.zIndex = '9999';
        imgElement.style.backgroundColor = 'rgba(0,0,0,0.9)';
        imgElement.style.objectFit = 'contain';
        imgElement.style.cursor = 'zoom-out';
        
        // Add click to exit fullscreen
        imgElement.addEventListener('click', exitFullscreen);
        document.addEventListener('keydown', handleFullscreenEscape);
    }
}

function exitFullscreen() {
    const fullscreenImg = document.querySelector('.fullscreen-image');
    if (fullscreenImg) {
        fullscreenImg.classList.remove('fullscreen-image');
        fullscreenImg.style.position = '';
        fullscreenImg.style.top = '';
        fullscreenImg.style.left = '';
        fullscreenImg.style.width = '';
        fullscreenImg.style.height = '';
        fullscreenImg.style.zIndex = '';
        fullscreenImg.style.backgroundColor = '';
        fullscreenImg.style.objectFit = 'contain';
        fullscreenImg.style.cursor = 'zoom-in';
        
        fullscreenImg.removeEventListener('click', exitFullscreen);
        document.removeEventListener('keydown', handleFullscreenEscape);
    }
}

function handleFullscreenEscape(e) {
    if (e.key === 'Escape') {
        exitFullscreen();
    }
}

// Additional utility functions for enhanced UX
function addRippleEffect(element, event) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');
    
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add keyboard navigation for modal
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('imageModal');
    if (modal && modal.classList.contains('show')) {
        switch(e.key) {
            case 'ArrowLeft':
                // Could be used for previous image in a gallery
                break;
            case 'ArrowRight':
                // Could be used for next image in a gallery
                break;
            case 'Enter':
            case ' ':
                e.preventDefault();
                const img = modal.querySelector('img');
                if (img) toggleImageFullscreen(img);
                break;
        }
    }
});

// Add touch gesture support for mobile
let touchStartX = 0;
let touchStartY = 0;

document.addEventListener('touchstart', function(e) {
    touchStartX = e.touches[0].clientX;
    touchStartY = e.touches[0].clientY;
});

document.addEventListener('touchend', function(e) {
    const modal = document.getElementById('imageModal');
    if (!modal || !modal.classList.contains('show')) return;
    
    const touchEndX = e.changedTouches[0].clientX;
    const touchEndY = e.changedTouches[0].clientY;
    const deltaX = touchEndX - touchStartX;
    const deltaY = touchEndY - touchStartY;
    
    // Swipe down to close modal
    if (deltaY > 100 && Math.abs(deltaX) < 50) {
        const bootstrapModal = bootstrap.Modal.getInstance(modal);
        if (bootstrapModal) bootstrapModal.hide();
    }
});

// Preload images for better performance
function preloadImage(src) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.onload = resolve;
        img.onerror = reject;
        img.src = src;
    });
}

// Enhanced table initialization with image preloading
$(document).ready(function() {
    // Preload profile images for better modal performance
    const profileImages = document.querySelectorAll('.profile-image-container img');
    profileImages.forEach(img => {
        preloadImage(img.src).catch(err => {
            console.log('Failed to preload image:', img.src);
        });
    });
    
    // Add click animation to profile images
    profileImages.forEach(img => {
        img.addEventListener('click', function(e) {
            addRippleEffect(this.parentElement, e);
        });
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

// Image preview functionality
document.getElementById('profile_image').addEventListener('change', function(e) {
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