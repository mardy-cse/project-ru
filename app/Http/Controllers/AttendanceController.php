<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\TrainingParticipant;


class AttendanceController extends Controller
{

    public function showContent(){
        $attendances = Attendance::all();
        return view('attendance.attendance', compact('attendances'));
    }

        
    public function openAttendanceDetails(string $id){
            $attendance = Attendance::findOrFail($id);
            $participants = TrainingParticipant::where('batch_id', $attendance->batch_id)->get();
            return view('attendance.attendance_details', compact('attendance', 'participants'));
        }



}
