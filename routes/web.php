<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingParticipantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





// Root route - Login check করে redirect করবে
Route::get('/', function () {

    if (Auth::check()) {
        // User login থাকলে dashboard এ redirect
        return redirect('/dashboardcontent');
    } else {
        // User login না থাকলে training courses দেখাবে
        return app(TrainingController::class)->displayTrainingCoursesForUsers();
    }
});

    Route::get('/training/courses', [TrainingController::class, 'TrainingCoursesForUsers']);

    //     Route::get('/dashboardcontent', function () {
    //     return view('user_views.trainings.user_training');
    // })->name('dashboard');



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


Route::get('/course/view/{id}', [TrainingController::class, 'viewTrainingCoursesForUsers'])->name('course.view');




require __DIR__.'/auth.php';


