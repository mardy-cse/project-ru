<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakerController extends Controller
{
   public function showContent()
    {
        return view('layouts.speaker_content');
    }
}
