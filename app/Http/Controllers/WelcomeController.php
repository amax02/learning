<?php

namespace App\Http\Controllers;

use App\Models\Video;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        $videos = Video::all();

        return view('welcome', compact(['videos']));
    }
}
