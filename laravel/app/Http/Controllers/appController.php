<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function whatsapp()
    {
        return redirect('https://wa.me/09232291210');
    }

    public function telegram()
    {
        return redirect('https://t.me/abansafar');
    }

    public function instagram()
    {
        return redirect('https://instagram.com/abansafar');
    }
}
