<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\TrainingParticipant;
use App\Models\Batches;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display attendance list for admin
     */
    public function showContent()
    {
        // Get all active batches with their training and participants
        $batches = Batches::with(['training', 'trainingParticipants'])
            ->whereHas('training') // Only show batches that have training associated
            ->get();
        
        // Create attendance records for each batch
        $attendances = [];
        foreach ($batches as $batch) {
            $attendances[] = [
                'id' => $batch->id,
                'training' => $batch->training,
                'batch' => $batch,
                'session_date' => $batch->start_date,
                'participant_count' => $batch->trainingParticipants->count()
            ];
        }
        
        return view('attendance.attendance', compact('attendances'));
    }

    /**
     * Show attendance details for a specific batch
     */
    public function openAttendanceDetails(string $batchId)
    {
        $batch = Batches::with(['training', 'trainingParticipants'])->findOrFail($batchId);
        $participants = $batch->trainingParticipants;
        
        // Create a dummy attendance object for display
        $attendance = (object) [
            'id' => $batch->id,
            'training' => $batch->training,
            'batch' => $batch,
            'session_date' => $batch->start_date
        ];
        
        return view('attendance.attendance_details', compact('attendance', 'participants'));
    }

    /**
     * Update attendance for participants
     */
    public function updateAttendance(Request $request, $batchId)
    {
        try {
            $batch = Batches::with('trainingParticipants')->findOrFail($batchId);
            $attendanceData = $request->input('attendance', []);
            
            DB::beginTransaction();
            
            foreach ($attendanceData as $participantId => $status) {
                $participant = TrainingParticipant::find($participantId);
                if ($participant && $participant->batch_id == $batchId) {
                    // Update participant status based on attendance
                    $participant->update([
                        'status' => $status === 'present' ? 1 : 0,
                        'updated_by' => Auth::id()
                    ]);
                    
                    // Also create/update attendance record
                    Attendance::updateOrCreate(
                        [
                            'batch_id' => $batchId,
                            'user_id' => $participant->id,
                            'session_date' => now()->toDateString()
                        ],
                        [
                            'training_id' => $batch->training_id,
                            'participant_name' => $participant->name,
                            'participant_email' => $participant->email,
                            'participant_phone' => $participant->mobile,
                            'venue' => $batch->venue,
                            'session_day' => $batch->session_day,
                            'start_time' => $batch->start_time,
                            'end_time' => $batch->end_time,
                            'attendance_status' => $status === 'present' ? 1 : 0,
                            'marked_by' => Auth::id(),
                            'marked_at' => now(),
                            'created_by' => Auth::id(),
                            'updated_by' => Auth::id()
                        ]
                    );
                }
            }
            
            DB::commit();
            
            return back()->with('success', 'Attendance updated successfully!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to update attendance. Please try again.');
        }
    }

    /**
     * Mark all participants as present
     */
    public function markAllPresent($batchId)
    {
        try {
            $batch = Batches::with('trainingParticipants')->findOrFail($batchId);
            
            DB::beginTransaction();
            
            foreach ($batch->trainingParticipants as $participant) {
                // Update participant status
                $participant->update([
                    'status' => 1,
                    'updated_by' => Auth::id()
                ]);
                
                // Create/update attendance record
                Attendance::updateOrCreate(
                    [
                        'batch_id' => $batchId,
                        'user_id' => $participant->id,
                        'session_date' => now()->toDateString()
                    ],
                    [
                        'training_id' => $batch->training_id,
                        'participant_name' => $participant->name,
                        'participant_email' => $participant->email,
                        'participant_phone' => $participant->mobile,
                        'venue' => $batch->venue,
                        'session_day' => $batch->session_day,
                        'start_time' => $batch->start_time,
                        'end_time' => $batch->end_time,
                        'attendance_status' => 1,
                        'marked_by' => Auth::id(),
                        'marked_at' => now(),
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id()
                    ]
                );
            }
            
            DB::commit();
            
            return back()->with('success', 'All participants marked as present!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to mark attendance. Please try again.');
        }
    }

    /**
     * Generate attendance report
     */
    public function generateReport($batchId)
    {
        $batch = Batches::with(['training', 'trainingParticipants'])->findOrFail($batchId);
        $attendanceRecords = Attendance::where('batch_id', $batchId)
            ->with('user')
            ->orderBy('session_date', 'desc')
            ->get();
        
        return view('attendance.report', compact('batch', 'attendanceRecords'));
    }
}
