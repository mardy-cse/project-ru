<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingCategory;
use App\Models\Batches;


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

    return view('user_views.trainings.training_courses', compact('batch', 'trainingCategory'));
}



}


