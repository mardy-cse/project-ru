<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakersController;
use Illuminate\Support\Facades\Route;

Route::get('/speaker_content', [SpeakersController::class, 'showContent']);
Route::get('/add_speaker', [SpeakersController::class, 'showAddSpeakerForm']);
// Route::get('/edit_speaker/{id}/editSpeaker', [SpeakersController::class, 'showEditSpeakerForm']);
// Route::get('/edit_speaker/{id}/edit', [SpeakersController::class, 'edit'])->name('speakers.edit');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboardcontent', function () {
    return view('layouts.dashboardcontent');
});



Route::get('/dashboard', function () {
    return view('dashboard');
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







require __DIR__.'/auth.php';
