<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\outline;

class InternationalTourController extends Controller
{
    public function index()
    {
        return view('InternationalTour.index');
    }

    public function show(outline $outline)
    {
        return view('InternationalTour.show', compact('outline'));
    }
}
