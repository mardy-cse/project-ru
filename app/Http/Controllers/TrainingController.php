<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingCategory;
use App\Models\Batches;
use App\Models\TrainingParticipant;


class TrainingController extends Controller
{
     public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'training_category_id' => 'required|integer',
        'training_overview' => 'required|string',
        'course_qualification' => 'required|string',
        'training_objective' => 'required|string',
        'course_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|integer',
    ]);

    // Handle thumbnail
    $thumbnailPath = null;
    if ($request->hasFile('course_thumbnail')) {
        $thumbnailPath = $request->file('course_thumbnail')->store('training/thumbnail', 'public');
    }

    $training = new Training;
    $training->name = $validated['name'];
    $training->training_category_id = $validated['training_category_id'];
    $training->training_overview = $validated['training_overview'];
    $training->course_qualification = $validated['course_qualification'];
    $training->training_objective = $validated['training_objective'];
    $training->course_thumbnail = $thumbnailPath;
    $training->status = $validated['status'];
    $training->created_by = Auth::id() ?? 0;
    $training->updated_by = Auth::id() ?? 0;
    $training->created_at = now();
    $training->updated_at = now();

    $training->save();

    return redirect('/training/list')->with('success', 'Training created successfully!');
}


public function edit(string $id)
{
    $training = Training::findOrFail($id);
    $trainingCategory = TrainingCategory::all();

    return view('layouts.edit_training', compact('training', 'trainingCategory'));
}


public function update(Request $request, string $id)
{
    // Validate inputs
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'training_category_id' => 'required|integer',
        'training_overview' => 'required|string',
        'course_qualification' => 'required|string',
        'training_objective' => 'required|string',
        'course_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|integer',
    ]);

    // Find the training
    $training = Training::findOrFail($id);

    // Handle image upload
if ($request->hasFile('course_thumbnail')) {
    $imagePath = $request->file('course_thumbnail')->store('training/thumbnail', 'public');
    $validated['course_thumbnail'] = $imagePath;
}



    // Update other fields
    $training->name = $validated['name'];
    $training->training_overview = $validated['training_overview'];
    $training->training_objective = $validated['training_objective'];
    $training->course_qualification = $validated['course_qualification'];
    $training->training_category_id = $validated['training_category_id'];
    $training->status = $validated['status'];

    $training->update($validated);

    return redirect('training/list')->with('success', 'Speaker updated successfully!');
}

        public function showContent()
    {
        $training = Training::latest()->get();
        return view('layouts.training', compact('training'));
    }


    public function showAddTrainingForm()
    {
        $trainingCategory = TrainingCategory::all();
        return view('layouts.add_training', compact('trainingCategory'));

    }

public function toggleStatus($id)
{
    $training = Training::findOrFail($id);
    $training->status = $training->status == 1 ? 0 : 1;
    $training->save();
    return redirect()->back()->with('success', 'Training status updated successfully.');
}


public function displayTrainingCoursesForUsers(){
    $batch = Batches::all();
    $trainingCategory = TrainingCategory::all();
    $allTrainings = Training::all();
    
    // Get enrolled courses for logged-in users (both pending and approved)
    $enrolledBatches = collect();
    if (Auth::check()) {
        $enrolledBatches = Batches::whereHas('trainingParticipants', function($query) {
            $query->where('email', Auth::user()->email);
            // Show both pending (status = false) and approved (status = true) enrollments
        })->with(['training', 'speaker', 'trainingParticipants'])->get();
    }
    
    return view('user_views.trainings.training_courses', compact('batch', 'trainingCategory', 'allTrainings', 'enrolledBatches'));
}



public function TrainingCoursesForUsers(){
  
    $batch = Batches::all();
    $trainingCategory = TrainingCategory::all();
    $allTrainings = Training::all();
    return view('user_views.trainings.user_training_view', compact('batch', 'trainingCategory', 'allTrainings'));
}



public function viewTrainingCoursesForUsers($id){
    $batch = Batches::with('training')->findOrFail($id);
    if ($batch->speaker && $batch->speaker->exparties_categories_id) {
        $batch->speaker->category_names = \App\Models\TrainingCategory::whereIn('id', $batch->speaker->exparties_categories_id)
            ->pluck('category_name')
            ->toArray();
    }

    return view('user_views.trainings.view_course', compact('batch'));
}

public function viewTrainingCoursesForUsersAfterLogin($id){
        $batch = Batches::with(['training', 'speaker'])->findOrFail($id);
        
        // Check if user is already enrolled
        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = TrainingParticipant::where('batch_id', $id)
                ->where('email', Auth::user()->email)
                ->exists();
        }
        
        if ($batch->speaker && $batch->speaker->exparties_categories_id) {
            $batch->speaker->category_names = \App\Models\TrainingCategory::whereIn('id', $batch->speaker->exparties_categories_id)
                ->pluck('category_name')
                ->toArray();
        }

        return view('user_views.trainings.user_view_course', compact('batch', 'isEnrolled'));
    }

    /**
     * Enroll user in a training batch
     */
    public function enrollInTraining(Request $request, $batchId)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Please login to enroll in training.');
            }

            $user = Auth::user();
            $batch = Batches::with('training')->findOrFail($batchId);

            // Check if user is already enrolled
            $existingEnrollment = TrainingParticipant::where('batch_id', $batchId)
                ->where('email', $user->email)
                ->first();

            if ($existingEnrollment) {
                return back()->with('info', 'You are already enrolled in this training.');
            }

            // Check if batch has available seats
            $enrolledCount = TrainingParticipant::where('batch_id', $batchId)
                ->count(); // Count all enrollments (both pending and approved)

            if ($enrolledCount >= $batch->seat_capacity) {
                return back()->with('error', 'Sorry, this batch is full. No more seats available.');
            }

            // Create new enrollment
            TrainingParticipant::create([
                'name' => $user->name,
                'email' => $user->email,
                'mobile' => $request->input('mobile', ''),
                'designation' => $request->input('designation', ''),
                'organization' => $request->input('organization', ''),
                'batch_id' => $batchId,
                'status' => false, // Initially pending, admin needs to approve
                'is_training_completed' => false,
                'created_by' => $user->id,
                'updated_by' => $user->id
            ]);

            return back()->with('success', 'Successfully enrolled in ' . $batch->training->name . '! Your enrollment is pending admin approval.');

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to enroll. Please try again.');
        }
    }

    /**
     * Cancel enrollment
     */
    public function cancelEnrollment($batchId)
    {
        try {
            if (!Auth::check()) {
                return redirect()->route('login');
            }

            $user = Auth::user();
            $enrollment = TrainingParticipant::where('batch_id', $batchId)
                ->where('email', $user->email)
                ->first();

            if (!$enrollment) {
                return back()->with('error', 'No enrollment found.');
            }

            $enrollment->delete();

            return back()->with('success', 'Enrollment cancelled successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to cancel enrollment. Please try again.');
        }
    }

    public function authenticatedTrainingCoursesForUsers(){
        $batch = Batches::all();
        $trainingCategory = TrainingCategory::all();
        $allTrainings = Training::all();
        
        // Get enrolled courses for logged-in users (both pending and approved)
        $enrolledBatches = collect();
        if (Auth::check()) {
            $enrolledBatches = Batches::whereHas('trainingParticipants', function($query) {
                $query->where('email', Auth::user()->email);
                // Show both pending (status = false) and approved (status = true) enrollments
            })->with(['training', 'speaker', 'trainingParticipants'])->get();
        }
        
        return view('user_views.trainings.authenticated_training_courses', compact('batch', 'trainingCategory', 'allTrainings', 'enrolledBatches'));
    }
}


