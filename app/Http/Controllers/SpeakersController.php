<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speakers;
use App\Models\TrainingCategory;
use Illuminate\Support\Facades\Log;

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
    // Convert images to Base64 first for preservation
    $profileImageBase64 = null;
    $signatureBase64 = null;
    
    // Check if we have preserved images from previous validation attempt
    if (session('old_profile_image')) {
        $profileImageBase64 = session('old_profile_image');
    } elseif ($request->hasFile('profile_image')) {
        try {
            $profileImageBase64 = $this->convertToBase64($request->file('profile_image'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['profile_image' => 'Failed to process profile image.'])->withInput();
        }
    }
    
    if (session('old_signature')) {
        $signatureBase64 = session('old_signature');
    } elseif ($request->hasFile('signature')) {
        try {
            $signatureBase64 = $this->convertToBase64($request->file('signature'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['signature' => 'Failed to process signature image.'])->withInput();
        }
    }

    try {
        $validated = $request->validate([
        'profile_image' => ($request->hasFile('profile_image') || session('old_profile_image') || $request->input('has_preserved_profile_image')) ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:speakers,email',
        'phone' => 'required|string|max:20|unique:speakers,phone',
        'designation' => 'required|string|max:255',
        'gender' => 'required|in:male,female,other',
        'organization' => 'required|string|max:255',
        'signature' => ($request->hasFile('signature') || session('old_signature') || $request->input('has_preserved_signature')) ? 'nullable|image|mimes:jpeg,png,jpg|max:100' : 'required',
        'status' => 'required|in:active,deactive',
        'link' => 'nullable|url|max:255',
        'exparties_categories_id' => 'required|array',
        'exparties_categories_id.*' => 'integer|min:1',
        'has_preserved_profile_image' => 'nullable|string',
        'has_preserved_signature' => 'nullable|string',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email address is already registered with another speaker.',
            'phone.required' => 'The mobile number field is required.',
            'phone.unique' => 'This mobile number is already registered with another speaker.',
            'designation.required' => 'The designation field is required.',
            'gender.required' => 'The gender field is required.',
            'organization.required' => 'The organization field is required.',
            'exparties_categories_id.required' => 'Please select at least one expertise.',
            'profile_image.required' => 'The profile image field is required.',
            'signature.required' => 'The signature field is required.',
            'link.url' => 'Please enter a valid URL (e.g., https://example.com).',
        ]);

        // Ensure we have images (either uploaded or from session)
        if (!$profileImageBase64) {
            return redirect()->back()->withErrors(['profile_image' => 'Profile image is required.'])->withInput();
        }
        
        if (!$signatureBase64) {
            return redirect()->back()->withErrors(['signature' => 'Signature is required.'])->withInput();
        }

        // Use the Base64 images
        $validated['profile_image'] = $profileImageBase64;
        $validated['signature'] = $signatureBase64;

        // Remove helper fields from validated data
        unset($validated['has_preserved_profile_image'], $validated['has_preserved_signature']);

        Speakers::create($validated);

        // Clear preserved images from session on success
        session()->forget(['old_profile_image', 'old_signature']);

        return redirect('speaker/list')->with('success', 'Speaker added successfully!');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Preserve images in session for redisplay
        if ($profileImageBase64) {
            session()->flash('old_profile_image', $profileImageBase64);
        }
        if ($signatureBase64) {
            session()->flash('old_signature', $signatureBase64);
        }
        
        // Re-throw the validation exception to show errors
        throw $e;
    }
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
    
    // Convert images to Base64 first for preservation
    $profileImageBase64 = null;
    $signatureBase64 = null;
    
    // Check if we have preserved images from previous validation attempt
    if (session('old_profile_image')) {
        $profileImageBase64 = session('old_profile_image');
    } elseif ($request->hasFile('profile_image')) {
        try {
            $profileImageBase64 = $this->convertToBase64($request->file('profile_image'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['profile_image' => 'Failed to process profile image.'])->withInput();
        }
    }
    
    if (session('old_signature')) {
        $signatureBase64 = session('old_signature');
    } elseif ($request->hasFile('signature')) {
        try {
            $signatureBase64 = $this->convertToBase64($request->file('signature'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['signature' => 'Failed to process signature image.'])->withInput();
        }
    }

    try {
        $validated = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:speakers,email,' . $speaker->id,
            'phone' => 'required|string|max:20|unique:speakers,phone,' . $speaker->id,
            'designation' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'organization' => 'required|string|max:255',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:100',
            'status' => 'required|in:active,deactive',
            'link' => 'nullable|url|max:255',
            'exparties_categories_id' => 'required|array',
            'exparties_categories_id.*' => 'string',
            'has_preserved_profile_image' => 'nullable|string',
            'has_preserved_signature' => 'nullable|string',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email address is already registered with another speaker.',
            'phone.required' => 'The mobile number field is required.',
            'phone.unique' => 'This mobile number is already registered with another speaker.',
            'designation.required' => 'The designation field is required.',
            'gender.required' => 'The gender field is required.',
            'organization.required' => 'The organization field is required.',
            'exparties_categories_id.required' => 'Please select at least one expertise.',
            'link.url' => 'Please enter a valid URL (e.g., https://example.com).',
        ]);

        // Handle file uploads and convert to Base64
        if ($profileImageBase64) {
            $validated['profile_image'] = $profileImageBase64;
        } else {
            unset($validated['profile_image']);
        }

        if ($signatureBase64) {
            $validated['signature'] = $signatureBase64;
        } else {
            unset($validated['signature']);
        }

        // Remove helper fields from validated data
        unset($validated['has_preserved_profile_image'], $validated['has_preserved_signature']);

        $speaker->update($validated);

        // Clear preserved images from session on success
        session()->forget(['old_profile_image', 'old_signature']);

        return redirect('speaker/list')->with('success', 'Speaker updated successfully!');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Preserve images in session for redisplay
        if ($profileImageBase64) {
            session()->flash('old_profile_image', $profileImageBase64);
        }
        if ($signatureBase64) {
            session()->flash('old_signature', $signatureBase64);
        }
        
        // Re-throw the validation exception to show errors
        throw $e;
    }
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

/**
 * Convert uploaded file to Base64 string
 */
private function convertToBase64($file)
{
    try {
        $fileContent = file_get_contents($file->getRealPath());
        $mimeType = $file->getMimeType();
        $base64 = base64_encode($fileContent);
        
        // Validate the Base64 string size (should not exceed reasonable limits)
        if (strlen($base64) > 10485760) { // 10MB limit for Base64
            throw new \Exception('Image file is too large after Base64 conversion');
        }
        
        return 'data:' . $mimeType . ';base64,' . $base64;
    } catch (\Exception $e) {
        Log::error('Base64 conversion failed: ' . $e->getMessage());
        throw new \Exception('Failed to process image file');
    }
}

    
}
