<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speakers;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function store(Request $request)
{

    $validated = $request->validate([
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:speakers,email',
        'phone' => 'required|string|max:20',
        'designation' => 'required|string|max:255',
        'experience_years' => 'required|integer|min:0',
        'total_projects' => 'nullable|integer|min:0',
        'status' => 'required|in:active,inactive,pending',
        // 'expertise' => 'required|string',
        'bio' => 'nullable|string',
    ]);

    // Handle profile image upload
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('public/speakers');
        $validated['profile_image'] = basename($imagePath);
    }

    Speakers::create($validated);

    return redirect()->back()->with('success', 'Speaker added successfully!');
}


    /**
     * Show the form for creating a new resource.
     */
    // public function create(Request $request)
    // {
    //     $speakers = new Speakers;
    //     $speakers->name = $request->name;
    // }

    

//     public function create(Request $request)
// {
//     // Validate the form input
//     $validated = $request->validate([
//         'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:speakers,email',
//         'phone' => 'required|string|max:20',
//         'designation' => 'required|string|max:255',
//         'experience_years' => 'required|integer|min:0|max:50',
//         'total_projects' => 'nullable|integer|min:0',
//         'status' => 'required|in:active,inactive,pending',
//         // 'expertise' => 'required|string', // expected as comma-separated or JSON
//         'bio' => 'nullable|string',
//     ]);

//     // Handle profile image upload
//     $profileImagePath = null;
//     if ($request->hasFile('profile_image')) {
//         $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
//     }

//     // Create new speaker record
//     $speaker = new Speakers;
//     $speaker->profile_image = $profileImagePath;
//     $speaker->name = $validated['name'];
//     $speaker->email = $validated['email'];
//     $speaker->phone = $validated['phone'];
//     $speaker->designation = $validated['designation'];
//     $speaker->experience_years = $validated['experience_years'];
//     $speaker->total_projects = $validated['total_projects'] ?? 0;
//     $speaker->status = $validated['status'];
    
//     // Store expertise as JSON if needed
//     // $speaker->expertise = json_encode(explode(',', $validated['expertise'])); // expects comma-separated skills
//     $speaker->bio = $validated['bio'] ?? null;

//     $speaker->save();

//     return redirect()->back()->with('success', 'Speaker added successfully.');
// }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showContent()
    {
        return view('layouts.speaker_content');
    }

     public function showAddSpeakerForm()
    {
        return view('layouts.add_speaker');
    }

    
}
