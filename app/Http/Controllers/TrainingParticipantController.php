<?php

namespace App\Http\Controllers;

use App\Models\TrainingParticipant;
use Illuminate\Http\Request;

class TrainingParticipantController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingParticipant $trainingParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingParticipant $trainingParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingParticipant $trainingParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingParticipant $trainingParticipant)
    {
        //
    }


    public function getParticipantsByBatchId($batchId){
        $participants = TrainingParticipant::where('batch_id', $batchId)->get();

        return response()->json($participants);
    }

}
