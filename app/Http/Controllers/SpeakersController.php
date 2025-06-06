<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speakers;
use App\Models\TrainingCategory;

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
    'status' => 'required|in:active,deactive',
    'link' => 'nullable|url|max:255',
    'exparties_categories_id' => 'required|array',

    'exparties_categories_id.*' => 'integer|min:1',
]);

    

    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('speakers/profiles', 'public');
        $validated['profile_image'] = $imagePath; 
    }

    if ($request->hasFile('signature')) {
        $signaturePath = $request->file('signature')->store('speakers/signatures', 'public');
        $validated['signature'] = $signaturePath; 
    }

Speakers::create($validated);



    return redirect('speaker/list')->with('success', 'Speaker added successfully!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit($id)
{
    $speaker = Speakers::findOrFail($id);
    $trainingCategories = TrainingCategory::all();
    return view('layouts.edit_speaker', compact('speaker', 'trainingCategories'));
}

public function update(Request $request, $id)
{
    $speaker = Speakers::findOrFail($id);
    
    $validated = $request->validate([
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:speakers,email,' . $speaker->id,
        'phone' => 'required|string|max:20',
        'designation' => 'required|string|max:255',
        'gender' => 'required|in:male,female,other',
        'organization' => 'required|string|max:255',
        'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:100',
        'status' => 'required|in:active,deactive',
        'link' => 'nullable|url|max:255',


        'exparties_categories_id' => 'required|array',

        'exparties_categories_id.*' => 'string',
    ]);

    // Handle file uploads
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('speakers/profiles', 'public');
        $validated['profile_image'] = $imagePath; 
    } else {
        unset($validated['profile_image']);
    }

    if ($request->hasFile('signature')) {
        $signaturePath = $request->file('signature')->store('speakers/signatures', 'public');
        $validated['signature'] = $signaturePath; 
    } else {
        unset($validated['signature']);
    }

    $speaker->update($validated);

    return redirect('speaker/list')->with('success', 'Speaker updated successfully!');
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
        $speakers = Speakers::latest()->get();
      
        return view('layouts.speaker_content', compact('speakers'));
    }

     public function showAddSpeakerForm()
    {

         $trainingCategories = TrainingCategory::all(); 
        return view('layouts.add_speaker', compact('trainingCategories'));
    }


     public function showEditSpeakerForm()
    {
         $trainingCategories = TrainingCategory::all(); 
        return view('layouts.edit_speaker', compact('trainingCategories'));
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
    $speaker->status = 'deactive';
    $speaker->save();

    return response()->json(['success' => true, 'status' => 'deactive']);
}


public function toggleStatus($id)
{
    $speaker = Speakers::findOrFail($id);

    if ($speaker->status === 'active') {
        $speaker->status = 'deactive';
    } else {
        $speaker->status = 'active';
    }

    $speaker->save();

    return redirect()->back()->with('success', 'Speaker status updated successfully.');
}



    
}
