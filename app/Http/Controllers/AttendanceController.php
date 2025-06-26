<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\TrainingParticipant;
use App\Models\Batches;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        
        // Create attendance object with current date
        $attendance = (object) [
            'id' => $batch->id,
            'training' => $batch->training,
            'batch' => $batch,
            'session_date' => now()->toDateString(), // Current date
            'current_date' => now(),
            'batch_start_date' => $batch->start_date,
            'batch_end_date' => $batch->end_date
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
            $currentDate = now()->toDateString();
            $batchStartDate = \Carbon\Carbon::parse($batch->start_date);
            
            // Check if batch has started
            if (now()->lt($batchStartDate)) {
                return back()->with('error', 'Cannot mark attendance. Batch has not started yet.');
            }
            
            // Debug logging
            Log::info('Attendance Update Debug:', [
                'batch_id' => $batchId,
                'attendance_data' => $attendanceData,
                'session_date' => $currentDate,
                'batch_start_date' => $batch->start_date,
                'participants_count' => $batch->trainingParticipants->count()
            ]);
            
            if (empty($attendanceData)) {
                return back()->with('error', 'No attendance data provided.');
            }
            
            DB::beginTransaction();
            
            $successCount = 0;
            foreach ($attendanceData as $participantId => $status) {
                $participant = TrainingParticipant::find($participantId);
                if ($participant && $participant->batch_id == $batchId) {
                    // Update participant status based on attendance
                    $participant->update([
                        'status' => $status === 'present' ? 1 : 0,
                        'updated_by' => Auth::id()
                    ]);
                    
                    $successCount++;
                    Log::info('Updated participant:', [
                        'participant_id' => $participantId,
                        'status' => $status,
                        'session_date' => $currentDate,
                        'participant_name' => $participant->name
                    ]);
                }
            }
            
            DB::commit();
            
            return back()->with('success', "Attendance updated successfully for {$successCount} participants on " . now()->format('d-M-Y') . "!");
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Attendance Update Error:', [
                'batch_id' => $batchId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Failed to update attendance: ' . $e->getMessage());
        }
    }

    /**
     * Mark all participants as present
     */
    public function markAllPresent($batchId)
    {
        try {
            $batch = Batches::with('trainingParticipants')->findOrFail($batchId);
            $batchStartDate = \Carbon\Carbon::parse($batch->start_date);
            
            // Check if batch has started
            if (now()->lt($batchStartDate)) {
                return back()->with('error', 'Cannot mark attendance. Batch has not started yet.');
            }
            
            if ($batch->trainingParticipants->count() === 0) {
                return back()->with('error', 'No participants found in this batch.');
            }
            
            DB::beginTransaction();
            
            $totalCount = $batch->trainingParticipants->count();
            foreach ($batch->trainingParticipants as $participant) {
                $participant->update([
                    'status' => 1, // Mark as Present
                    'updated_by' => Auth::id()
                ]);
            }
            
            DB::commit();
            
            return back()->with('success', "All {$totalCount} participants marked as Present for " . now()->format('d-M-Y') . "!");
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Mark All Present Error:', [
                'batch_id' => $batchId,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Failed to mark attendance: ' . $e->getMessage());
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
