<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\outsideholytors;

class InternationalPilgrimageTourController extends Controller
{
    public function index()
    {
        return view('InternationalPilgrimageTour.index');
    }

    public function show(outsideholytors $InternationalPilgrimageTour)
    {
        return view('InternationalPilgrimageTour.show', compact('InternationalPilgrimageTour'));
    }
}
