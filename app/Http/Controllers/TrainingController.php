<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'training_category_id' => 'required|integer',
        'training_overview' => 'required|string',
        'course_qualification' => 'required|string',
        'training_objective' => 'required|string',
        // 'course_thumbnail' => 'nullable|file|image|max:2048',
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

//  public function store(Request $request)
// {
//     // dd($request->all());
//     // Validate the request
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'training_category_id' => 'required|integer',
//         'training_overview' => 'required|string',
//         'course_qualification' => 'required|string',
//         'training_objective' => 'required|string',
//         // 'training_outline' => 'nullable|string',
//         'course_thumbnail' => 'nullable|string|max:255',
//         'status' => 'required|integer',
//         'created_by' => 'nullable|integer',
//         'updated_by' => 'nullable|integer',
//     ]);

// $courseThumbnailPath = null;
// if ($request->hasFile('course_thumbnail')) {
//     $courseThumbnailPath = $request->file('course_thumbnail')->store('training/thumbnail', 'public');
// }


 

 
//     $training = new Training;
//     $training->name = $request->name;
//     $training->training_category_id = $request->training_category_id;
//     $training->training_overview = $request->training_overview;
//     $training->course_qualification = $request->course_qualification;
//     $training->training_objective = $request->training_objective;
//     // $training->course_thumbnail = $request->course_thumbnail;
//     $training->course_thumbnail = $courseThumbnailPath;
//     $training->status = $request->status;
//     $training->created_by = Auth::id() ?? 0; 
//     $training->updated_by = Auth::id() ?? 0;
//     $training->created_at = now(); 
//     $training->updated_at = now(); 

//     $training->save();
//     return redirect('/training/list')->with('success', 'Training created successfully!');

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
        $training = Training::all();
        return view('layouts.training', compact('training'));
    }


    //  public function showContent()
    // {
    //     $speakers = Speakers::all();
    //     return view('layouts.speaker_content', compact('speakers'));
    // }


    public function showAddTrainingForm()
    {
        return view('layouts.add_training');
    }

public function toggleStatus($id)
{
    $training = Training::findOrFail($id);
    $training->status = $training->status == 1 ? 0 : 1;
    $training->save();
    return redirect()->back()->with('success', 'Training status updated successfully.');
}

}


