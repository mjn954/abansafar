<?php

namespace App\Http\Controllers;

use App\Models\typetors;
use Illuminate\Http\Request;

class TypetorsController extends Controller
{
    public function index()
    {

        $Typetors = typetors::all();
        return view('home', compact('Typetors'));
    }
}
