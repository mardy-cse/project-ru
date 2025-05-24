@extends('dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
  <div class="max-w-7xl mx-auto">
    
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8 bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
      <div>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
          Speaker Management
        </h1>
        <p class="text-gray-600 mt-2 text-lg">Manage and organize your speakers efficiently</p>
      </div>
      <button class="px-8 py-3 rounded-xl flex items-center gap-3 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-black font-semibold border-2 border-gray-200 hover:border-gray-300" style="background-color: #DBF5D0;" onmouseover="this.style.backgroundColor='#c3e6b0'" onmouseout="this.style.backgroundColor='#DBF5D0'" onclick="openAddModal()">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span class="font-semibold">Add Speaker</span>
      </button>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
      <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
        <h2 class="text-xl font-bold text-gray-900">All Speakers</h2>
      </div>
      
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Speaker</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contact</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Expertise</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Experience</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <!-- Sample Speaker Row -->
            <tr class="hover:bg-blue-50 transition-all duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-14 w-14">
                    <img class="h-14 w-14 rounded-full object-cover ring-4 ring-blue-100 shadow-lg" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150" alt="Speaker">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-bold text-gray-900">John Doe</div>
                    <div class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full inline-block">Senior Developer</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-medium">john.doe@example.com</div>
                <div class="text-sm text-gray-500">+880 1712-345678</div>
              </td>
              <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Laravel</span>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Vue.js</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-bold">5 Years</div>
                <div class="text-xs text-gray-500">15+ Projects</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                  <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewSpeaker(1)">View</button>
                <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="editSpeaker(1)">Edit</button>
                <button class="text-red-600 hover:text-red-900" onclick="deleteSpeaker(1)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Add Speaker Modal -->
<div id="addSpeakerModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-6">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden m-4">
    
    <!-- Modal Header with Close Button -->
    <div style="padding-left: 50px" class="flex justify-between items-center p-8 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50">
      <div>
        <h3 class="text-2xl font-bold text-gray-900">Add New Speaker</h3>
        <p class="text-gray-600 mt-1">Fill in the details to add a new speaker</p>
      </div>
      <!-- Close Button (Top Right) -->
      <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full p-3 transition-all duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>

    <!-- Modal Body (Scrollable) with Extra Padding -->
    <div class="p-8 overflow-y-auto max-h-[calc(90vh-250px)]">
      <!-- FORM STARTS HERE with Padding -->
      <form id="addSpeakerForm" enctype="multipart/form-data" method="POST" action="#" class="p-6 bg-gray-50 rounded-xl">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          
          <!-- Profile Image -->
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-3">Profile Image</label>
            <div class="flex items-center space-x-6">
              <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden border-2 border-dashed border-gray-300">
                <img id="imagePreview" class="w-full h-full object-cover hidden" alt="Preview">
                <svg id="imagePlaceholder" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <input type="file" id="profile_image" name="profile_image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
            </div>
          </div>

          <!-- Name -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-3">Full Name <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" required class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Enter full name">
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-3">Email Address <span class="text-red-500">*</span></label>
            <input type="email" id="email" name="email" required class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Enter email address">
          </div>

          <!-- Phone -->
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-3">Phone Number <span class="text-red-500">*</span></label>
            <input type="tel" id="phone" name="phone" required class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="+880 1712-345678">
          </div>

          <!-- Designation -->
          <div>
            <label for="designation" class="block text-sm font-medium text-gray-700 mb-3">Designation <span class="text-red-500">*</span></label>
            <input type="text" id="designation" name="designation" required class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="e.g., Senior Developer">
          </div>

          <!-- Experience Years -->
          <div>
            <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-3">Experience (Years) <span class="text-red-500">*</span></label>
            <input type="number" id="experience_years" name="experience_years" required min="0" max="50" class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="5">
          </div>

          <!-- Total Projects -->
          <div>
            <label for="total_projects" class="block text-sm font-medium text-gray-700 mb-3">Total Projects</label>
            <input type="number" id="total_projects" name="total_projects" min="0" class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="15">
          </div>

          <!-- Status -->
          <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-3">Status <span class="text-red-500">*</span></label>
            <select id="status" name="status" required class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
              <option value="">Select Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="pending">Pending</option>
            </select>
          </div>

          <!-- Expertise -->
          <div class="md:col-span-2">
            <label for="expertise" class="block text-sm font-medium text-gray-700 mb-3">Expertise/Skills <span class="text-red-500">*</span></label>
            <div class="space-y-4">
              <input type="text" id="expertiseInput" placeholder="Type skill and press Enter (e.g., Laravel, PHP, JavaScript)" class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
              <div id="expertiseContainer" class="flex flex-wrap gap-3 min-h-[60px] p-4 border border-gray-300 rounded-lg bg-white">
                <span class="text-sm text-gray-500 italic">Add skills by typing and pressing Enter</span>
              </div>
              <input type="hidden" id="expertise" name="expertise">
            </div>
          </div>

          <!-- Bio -->
          <div class="md:col-span-2">
            <label for="bio" class="block text-sm font-medium text-gray-700 mb-3">Bio/Description</label>
            <textarea id="bio" name="bio" rows="5" class="w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Brief description about the speaker's background and expertise..."></textarea>
          </div>
        </div>
        
        <!-- Form Footer with Submit Button -->
        <div class="mt-8 flex justify-end space-x-4 border-t pt-6">
            <button type="button" onclick="closeAddModal()" class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-all duration-300 font-medium">
            Cancel
          </button>
          
          <button type="button" onclick="closeAddModal()" class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-all duration-300 font-medium">
            Add Speaker
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
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

// Expertise tags functionality
document.getElementById('expertiseInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const skill = this.value.trim();
        if (skill) {
            addSkillTag(skill);
            this.value = '';
        }
    }
});

function addSkillTag(skill) {
    const container = document.getElementById('expertiseContainer');
    const italicText = container.querySelector('span.text-gray-500');
    if (italicText) italicText.remove();
    
    const tag = document.createElement('span');
    tag.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800';
    tag.textContent = skill;
    
    const removeBtn = document.createElement('button');
    removeBtn.className = 'ml-1.5 text-blue-600 hover:text-blue-900';
    removeBtn.innerHTML = '&times;';
    removeBtn.onclick = function() { tag.remove(); updateExpertiseInput(); };
    
    tag.appendChild(removeBtn);
    container.appendChild(tag);
    updateExpertiseInput();
}

function updateExpertiseInput() {
    const container = document.getElementById('expertiseContainer');
    const tags = container.querySelectorAll('span:not(.text-gray-500)');
    const skills = Array.from(tags).map(tag => tag.textContent.replace('×', '').trim());
    document.getElementById('expertise').value = skills.join(',');
}
</script>
@endsection