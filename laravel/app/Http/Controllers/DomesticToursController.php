<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insidetors;

class DomesticToursController extends Controller
{
    public function index()
    {
        return view('DomesticTours.index');
    }

    public function show(Insidetors $Domesticpilgrimagetour)
    {
        return view('DomesticTours.show', compact('Domesticpilgrimagetour'));
    }
}
