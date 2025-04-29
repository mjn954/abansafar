<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminController;

class AdminControllerController extends Controller
{
    public function index()
    {
        return view('Admin');
    }

    public function validateLogin(Request $request)
    {
        // اعتبارسنجی داده‌های ورودی
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);


        $admin = AdminController::where('email', $request->email)->first();


        if ($admin && $admin->password === $request->password) {

            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است.']);
    }
}
