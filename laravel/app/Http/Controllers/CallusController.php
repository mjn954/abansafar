<?php

namespace App\Http\Controllers;

use App\Models\callus;
use Illuminate\Http\Request;

class CallusController extends Controller
{

    public function index()
    {
        $messages = callus::latest()->paginate(10);
        return view('callus.index', compact('messages'));
    }
    public function store(Request $request)
    {
        // اعتبارسنجی اطلاعات ورودی
        $validated = $request->validate([
            'name' => 'required|string|max:50|min:3',
            'phonenumber' => 'required|max:11',
            'body' => 'required|string',
        ]);
        callus::create($validated);
        return redirect()->route('home.page')->with('success',
            'پیام شما با موفقیت ثبت و ارسال شد. جهت ارتباط با اپراتور با شماره 09232291210 تماس بگیرید.'
        );
    }
    public function show($id)
{
    $message = Callus::findOrFail($id);
    return view('callus.show', compact('message'));
}

public function destroy($id)
{

    $message = Callus::findOrFail($id);
    $message->delete();
    return redirect()->route('callus.index')->with('success', 'پیام با موفقیت حذف شد.');
}


}
