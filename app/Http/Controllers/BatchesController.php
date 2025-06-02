<?php

namespace App\Http\Controllers;
use App\Models\Batches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;
use App\Models\Speakers;


class BatchesController extends Controller
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
    // Validate input
    $request->validate([
        // 'training_id' => 'required|exists:trainings,id',
        'name' => 'required|string|max:255',
        'speaker_name' => 'required|string|max:255',

        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        'class_duration' => 'required|integer|min:1',

        'seat_capacity' => 'required|integer|min:1',
        'number_of_sessions' => 'required|integer|min:1',
        'total_session_hours' => 'required|integer|min:0',
        'total_session_minutes' => 'required|integer|min:0|max:59',

        'enrollment_deadline' => 'required|date|before_or_equal:start_date',
        'expected_start_date' => 'required|date',

        'venue' => 'required|string|max:255',
        'session_day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',

        'batch_status' => 'required|in:0,1,2',
        'visible_platform' => 'required|in:web,mobile,both',
        'publication_status' => 'required|in:0,1',
    ]);

    // Create and save batch
    $batch = new Batches;
    $batch->training_id = $request->training_id;
    $batch->name = $request->name;
    $batch->speaker_name = $request->speaker_name;

    $batch->start_date = $request->start_date;
    $batch->end_date = $request->end_date;
    $batch->start_time = $request->start_time;
    $batch->end_time = $request->end_time;
    $batch->class_duration = $request->class_duration;

    $batch->seat_capacity = $request->seat_capacity;
    $batch->number_of_sessions = $request->number_of_sessions;
    $batch->total_session_hours = $request->total_session_hours;
    $batch->total_session_minutes = $request->total_session_minutes;

    $batch->enrollment_deadline = $request->enrollment_deadline;
    $batch->expected_start_date = $request->expected_start_date;

    $batch->venue = $request->venue;
    $batch->session_day = $request->session_day;

    $batch->batch_status = $request->batch_status;
    $batch->visible_platform = $request->visible_platform;
    $batch->publication_status = $request->publication_status;

    $batch->created_by = Auth::id(); // Optional: requires user to be logged in
    $batch->save();

    return redirect('/batch/list')->with('success', 'Batch created successfully!');

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
    // public function edit(string $id)
    // {
    //     $batch = Batches::findOrFail($id);
    //     return view('batches.edit_batch', compact('batch'));
    // }



    public function open(string $id)
    {
        $batch = Batches::findOrFail($id);
        return view('batches.batch_info', compact('batch'));
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    public function update(Request $request, $id)
{
    // Validate input
    $request->validate([
        // 'training_id' => 'required|exists:trainings,id',
        'name' => 'required|string|max:255',
        'speaker_name' => 'required|string|max:255',

        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        'class_duration' => 'required|integer|min:1',

        'seat_capacity' => 'required|integer|min:1',
        'number_of_sessions' => 'required|integer|min:1',
        'total_session_hours' => 'required|integer|min:0',
        'total_session_minutes' => 'required|integer|min:0|max:59',

        'enrollment_deadline' => 'required|date|before_or_equal:start_date',
        'expected_start_date' => 'required|date',

        'venue' => 'required|string|max:255',
        'session_day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',

        'batch_status' => 'required|in:0,1',
        'visible_platform' => 'required|in:web,mobile,both',
        'publication_status' => 'required|in:0,1',
    ]);

    // Find existing batch
    $batch = Batches::findOrFail($id);

    // dd($batch);

    // Update fields
    $batch->training_id = $request->training_id;
    $batch->name = $request->name;
    $batch->speaker_name = $request->speaker_name;

    $batch->start_date = $request->start_date;
    $batch->end_date = $request->end_date;
    $batch->start_time = $request->start_time;
    $batch->end_time = $request->end_time;
    $batch->class_duration = $request->class_duration;

    $batch->seat_capacity = $request->seat_capacity;
    $batch->number_of_sessions = $request->number_of_sessions;
    $batch->total_session_hours = $request->total_session_hours;
    $batch->total_session_minutes = $request->total_session_minutes;

    $batch->enrollment_deadline = $request->enrollment_deadline;
    $batch->expected_start_date = $request->expected_start_date;

    $batch->venue = $request->venue;
    $batch->session_day = $request->session_day;

    $batch->batch_status = $request->batch_status;
    $batch->visible_platform = $request->visible_platform;
    $batch->publication_status = $request->publication_status;

    $batch->updated_by = Auth::id(); // Optional: if you track who updated
    $batch->save();

    // Simple version
    return redirect('/batch/list')->with('success', 'Batch updated successfully!');
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
        $batch = Batches::all();
          $categories = [
                1 => 'Web Development',
                2 => 'App Development',
                3 => 'Data Science',
                4 => 'Machine Learning',
                5 => 'Cybersecurity',
                6 => 'Cloud Computing',
                7 => 'DevOps',
                8 => 'Networking',
                9 => 'System Administration'
              ];
        return view('batches.batch', compact('batch', 'categories'));
    }

    // public function showCreateNewBatchForm()
    // {
    //     return view('batches.create_new_batch');
    // }

public function showCreateNewBatchForm()
{
    $trainings = Training::all();
    $speakers = Speakers::where('status', 'active')->get();
    return view('batches.create_new_batch', compact('trainings', 'speakers'));
}


public function edit(string $id)
{
    $batch = Batches::findOrFail($id);
    $trainings = Training::all(); // Object হিসেবে, pluck না করে
    $speakers = Speakers::where('status', 'active')->get(); // showCreateNewBatchForm এর মতো
    return view('batches.edit_batch', compact('batch', 'trainings', 'speakers'));
}

    public function togglePublishStatus($id)
{
    $batch = Batches::findOrFail($id);

    if ($batch->publication_status == '1') {
        $batch->publication_status = '0';
    } else {
        $batch->publication_status = '1';
    }

    $batch->save();
    return redirect()->back()->with('success', 'Published status updated successfully.');
}
}
