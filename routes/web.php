<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakersController;
use Illuminate\Support\Facades\Route;

Route::get('/speaker_content', [SpeakersController::class, 'showContent']);
Route::get('/add_speaker', [SpeakersController::class, 'showAddSpeakerForm']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboardcontent', function () {
    return view('layouts.dashboardcontent');
});

// Route::get('/speaker_content', function () {
//     return view('layouts.speaker_content');
// });



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






require __DIR__.'/auth.php';
