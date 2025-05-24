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
      <button class="px-8 py-3 rounded-xl flex items-center gap-3 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-black font-semibold border-2 border-gray-200 hover:border-gray-300" style="background-color: #DBF5D0; hover:background-color: #c3e6b0;" onclick="openAddModal()">
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
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rating</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <!-- Speaker 1 -->
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
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">PHP</span>
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
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex text-yellow-400">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"></svg>
                  </div>
                  <span class="ml-1 text-sm font-semibold">4.5</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewSpeaker(1)">View</button>
                <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="editSpeaker(1)">Edit</button>
                <button class="text-red-600 hover:text-red-900" onclick="deleteSpeaker(1)">Delete</button>
              </td>
            </tr>
            
            <tr class="hover:bg-blue-50 transition-all duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-14 w-14">
                    <img class="h-14 w-14 rounded-full object-cover ring-4 ring-blue-100 shadow-lg" src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150" alt="Speaker">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-bold text-gray-900">Jane Smith</div>
                    <div class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full inline-block">UI/UX Designer</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-medium">jane.smith@example.com</div>
                <div class="text-sm text-gray-500">+880 1812-345678</div>
              </td>
              <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Figma</span>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-800">Adobe XD</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-bold">3 Years</div>
                <div class="text-xs text-gray-500">10+ Projects</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                  <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex text-yellow-400">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"></svg>
                  </div>
                  <span class="ml-1 text-sm font-semibold">4.8</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewSpeaker(2)">View</button>
                <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="editSpeaker(2)">Edit</button>
                <button class="text-red-600 hover:text-red-900" onclick="deleteSpeaker(2)">Delete</button>
              </td>
            </tr>
            
            <tr class="hover:bg-blue-50 transition-all duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-14 w-14">
                    <img class="h-14 w-14 rounded-full object-cover ring-4 ring-blue-100 shadow-lg" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150" alt="Speaker">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-bold text-gray-900">Mike Johnson</div>
                    <div class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full inline-block">DevOps Engineer</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-medium">mike.johnson@example.com</div>
                <div class="text-sm text-gray-500">+880 1912-345678</div>
              </td>
              <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Docker</span>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">AWS</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-bold">7 Years</div>
                <div class="text-xs text-gray-500">20+ Projects</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                  <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                  Inactive
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex text-yellow-400">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"></svg>
                  </div>
                  <span class="ml-1 text-sm font-semibold">3.9</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewSpeaker(3)">View</button>
                <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="editSpeaker(3)">Edit</button>
                <button class="text-red-600 hover:text-red-900" onclick="deleteSpeaker(3)">Delete</button>
              </td>
            </tr>
            
            <tr class="hover:bg-blue-50 transition-all duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-14 w-14">
                    <img class="h-14 w-14 rounded-full object-cover ring-4 ring-blue-100 shadow-lg" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150" alt="Speaker">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-bold text-gray-900">Sarah Wilson</div>
                    <div class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full inline-block">Data Scientist</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-medium">sarah.wilson@example.com</div>
                <div class="text-sm text-gray-500">+880 1612-345678</div>
              </td>
              <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Python</span>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">Machine Learning</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-bold">4 Years</div>
                <div class="text-xs text-gray-500">12+ Projects</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                  <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex text-yellow-400">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"></svg>
                  </div>
                  <span class="ml-1 text-sm font-semibold">4.7</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewSpeaker(4)">View</button>
                <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="editSpeaker(4)">Edit</button>
                <button class="text-red-600 hover:text-red-900" onclick="deleteSpeaker(4)">Delete</button>
              </td>
            </tr>
            
            <tr class="hover:bg-blue-50 transition-all duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-14 w-14">
                    <img class="h-14 w-14 rounded-full object-cover ring-4 ring-blue-100 shadow-lg" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150" alt="Speaker">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-bold text-gray-900">David Brown</div>
                    <div class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full inline-block">Mobile App Developer</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-medium">david.brown@example.com</div>
                <div class="text-sm text-gray-500">+880 1512-345678</div>
              </td>
              <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">React Native</span>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Flutter</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 font-bold">6 Years</div>
                <div class="text-xs text-gray-500">18+ Projects</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                  <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex text-yellow-400">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"></svg>
                  </div>
                  <span class="ml-1 text-sm font-semibold">4.6</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewSpeaker(5)">View</button>
                <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="editSpeaker(5)">Edit</button>
                <button class="text-red-600 hover:text-red-900" onclick="deleteSpeaker(5)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection