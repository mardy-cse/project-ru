<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingParticipantController;
use Illuminate\Support\Facades\Route;

// Public routes (no authentication required)
// Route::get('/', function () {
//     return view('welcome');
// });


// All other routes require authentication
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboardcontent', function () {
        return view('layouts.dashboardcontent');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Speaker routes
    Route::get('/speaker/list', [SpeakersController::class, 'showContent']);
    Route::get('/speaker/add_new', [SpeakersController::class, 'showAddSpeakerForm']);
    Route::post('/speakers', [SpeakersController::class, 'store'])->name('speakers.store');
    Route::post('/speakers/{id}/activate', [SpeakersController::class, 'activate'])->name('speakers.activate');
    Route::post('/speakers/{id}/deactivate', [SpeakersController::class, 'deactivate'])->name('speakers.deactivate');
    Route::get('/speaker/{id}/toggle', [SpeakersController::class, 'toggleStatus']);
    Route::get('/speaker/{id}/edit', [SpeakersController::class, 'edit']);
    Route::put('/speakers/{id}', [SpeakersController::class, 'update'])->name('speakers.update');

    // Training routes
    Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
    Route::get('/training/list', [TrainingController::class, 'showContent']);
    Route::get('/training/add_training', [TrainingController::class, 'showAddTrainingForm']);
    Route::get('/training/{id}/toggle', [TrainingController::class, 'toggleStatus']);
    Route::get('/training/{id}/edit', [TrainingController::class, 'edit']);
    Route::put('/training/{id}', [TrainingController::class, 'update'])->name('training.update');

    // Batch routes
    Route::post('/batch', [BatchesController::class, 'store'])->name('batch.store');
    Route::get('/batch/list', [BatchesController::class, 'showContent']);
    Route::get('/batch/add_new_batch', [BatchesController::class, 'showCreateNewBatchForm']);
    Route::get('/batch/{id}/open', [BatchesController::class, 'open']);
    Route::get('/batch/{id}/edit', [BatchesController::class, 'edit']);
    Route::put('/batch/{id}', [BatchesController::class, 'update'])->name('batch.update');
    Route::get('/batch/{id}/togglePublishStatus', [BatchesController::class, 'togglePublishStatus']);
    Route::get('/participant/{id}/toggle-status', [BatchesController::class, 'toggleParticipantStatus'])->name('participant.toggleStatus');
    Route::get('/participant/approve-all/{id}', [BatchesController::class, 'approveAllParticipant']);

    // Attendance routes
    Route::get('/attendance/list', [AttendanceController::class, 'showContent']);
    Route::get('/attendance/details/{id}', [AttendanceController::class, 'openAttendanceDetails']);

    // Certificate routes (when you add them)
    
});



//User routes without authentication
// Route::get('/training/course', [TrainingController::class, 'displayTrainingCoursesForUsers']);

Route::get('/',[TrainingController::class, 'displayTrainingCoursesForUsers']);

require __DIR__.'/auth.php';




// -----------------------------
//Previous code
/*
<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/speaker/list', [SpeakersController::class, 'showContent']);
Route::get('/speaker/add_new', [SpeakersController::class, 'showAddSpeakerForm']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboardcontent', function () {
    return view('layouts.dashboardcontent');
});



Route::get('/dashboardcontent', function () {
    return view('layouts.dashboardcontent');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  Route::post('/speakers/create', [SpeakersController::class, 'create'])->name('speakers.create');
Route::post('/speakers', [SpeakersController::class, 'store'])->name('speakers.store');



Route::post('/speakers/{id}/activate', [SpeakersController::class, 'activate'])->name('speakers.activate');
Route::post('/speakers/{id}/deactivate', [SpeakersController::class, 'deactivate'])->name('speakers.deactivate');

Route::get('/speaker/{id}/toggle', [SpeakersController::class, 'toggleStatus']);
Route::get('/speaker/{id}/edit', [SpeakersController::class, 'edit']);
Route::put('/speakers/{id}', [SpeakersController::class, 'update'])->name('speakers.update');


// Training
Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::get('/training/list', [TrainingController::class, 'showContent']);
Route::get('/training/add_training', [TrainingController::class, 'showAddTrainingForm']);
Route::get('/training/{id}/toggle', [TrainingController::class, 'toggleStatus']);
Route::get('/training/{id}/edit', [TrainingController::class, 'edit']);
Route::put('/training/{id}', [TrainingController::class, 'update'])->name('training.update');

//Batches
Route::post('/batch', [BatchesController::class, 'store'])->name('batch.store');
Route::get('/batch/list', [BatchesController::class, 'showContent']);
Route::get('/batch/add_new_batch', [BatchesController::class, 'showCreateNewBatchForm']);
Route::get('/batch/{id}/open', [BatchesController::class, 'open']);
Route::get('/batch/{id}/edit', [BatchesController::class, 'edit']);
Route::put('/batch/{id}', [BatchesController::class, 'update'])->name('batch.update');
Route::get('/batch/{id}/togglePublishStatus', [BatchesController::class, 'togglePublishStatus']);
Route::get('/participant/{id}/toggle-status', [BatchesController::class, 'toggleParticipantStatus'])->name('participant.toggleStatus');
Route::get('/participant/approve-all/{id}', [BatchesController::class, 'approveAllParticipant']);

// Route::post('/participant/{id}/update-status', [BatchesController::class, 'updateParticipantStatus']);


// Add these routes to your routes/web.php file
// Route::get('/participants', [TrainingParticipantController::class, 'index'])->name('participants.index');
// Route::get('/batch/{batchId}/participants', [TrainingParticipantController::class, 'showBatchParticipants'])->name('participants.batch');
// Route::patch('/participants/{id}/status', [TrainingParticipantController::class, 'updateStatus'])->name('participants.updateStatus');




//Attendance
Route::get('/attendance/list', [AttendanceController::class, 'showContent']);
Route::get('/attendance/details/{id}', [AttendanceController::class, 'openAttendanceDetails']);




//Certificate







require __DIR__.'/auth.php';

*/