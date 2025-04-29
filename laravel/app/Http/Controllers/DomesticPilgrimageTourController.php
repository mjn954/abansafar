<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inssideholytors;
class DomesticPilgrimageTourController extends Controller
{
    public function index()
    {
        return view('Domesticpilgrimagetour.index');
    }

    public function show(inssideholytors $Domesticpilgrimagetour)
    {
        return view('Domesticpilgrimagetour.show', compact('Domesticpilgrimagetour'));
    }

}
