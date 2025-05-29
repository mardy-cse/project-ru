<?php

use App\Http\Controllers\BatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\TrainingController;
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






require __DIR__.'/auth.php';
