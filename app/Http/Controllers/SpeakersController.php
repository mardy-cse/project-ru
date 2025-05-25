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
            'gender' => 'required|in:male,female,other',
            'organization' => 'required|string|max:255',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:100',
            'status' => 'required|in:active,inactive',
            'link' => 'nullable|url|max:255',
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('public/speakers/profiles');
            $validated['profile_image'] = basename($imagePath);
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('public/speakers/signatures');
            $validated['signature'] = basename($signaturePath);
        }

        Speakers::create($validated);

        // return redirect()->back()->with('success', 'Speaker added successfully!');
         return redirect('/speaker_content')->with('success', 'Speaker added successfully!');
    }


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
        $speakers = Speakers::all();
        return view('layouts.speaker_content', compact('speakers'));
    }

     public function showAddSpeakerForm()
    {
        return view('layouts.add_speaker');
    }

    // app/Http/Controllers/SpeakerController.php

public function activate($id)
{
    $speaker = Speakers::findOrFail($id);
    $speaker->status = 'active';
    $speaker->save();

    return response()->json(['success' => true, 'status' => 'active']);
}

public function deactivate($id)
{
    $speaker = Speakers::findOrFail($id);
    $speaker->status = 'inactive';
    $speaker->save();

    return response()->json(['success' => true, 'status' => 'inactive']);
}


public function toggleStatus($id)
{
    $speaker = Speakers::findOrFail($id);

    if ($speaker->status === 'active') {
        $speaker->status = 'inactive';
    } else {
        $speaker->status = 'active';
    }

    $speaker->save();

    return redirect()->back()->with('success', 'Speaker status updated successfully.');
}



    
}
