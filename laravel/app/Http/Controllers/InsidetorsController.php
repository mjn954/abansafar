<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\insidetors;

class InsidetorsController extends Controller
{
    public function index()
    {
        $insidetors = insidetors::all();
        return view('insidetors.index', compact("insidetors"));
    }

    public function create()
    {
        return view("insidetors.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'target'          => 'required|string|max:255',
            'startpoint'      => 'required|string|max:255',
            'price'           => 'required|numeric',
            'status'          => 'required|string',
            'type'            => 'required|string|max:255',
            'plan'            => 'required|string',
            'duration'        => 'required|string|max:255',
            'hotel_features'  => 'required|string',
            'image'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest = public_path('insidetorsimage');
            if (!File::isDirectory($dest)) {
                File::makeDirectory($dest, 0755, true);
            }
            $image->move($dest, $filename);
            $imagePath = 'insidetorsimage/' . $filename;
        }

        insidetors::create([
            'title'          => $request->title,
            'target'         => $request->target,
            'startpoint'     => $request->startpoint,
            'price'          => $request->price,
            'status'         => $request->status,
            'type'           => $request->type,
            'plan'           => $request->plan,
            'duration'       => $request->duration,
            'hotel_features' => $request->hotel_features,
            'image'          => $imagePath,
        ]);

        return redirect()->route('index.insidetors')->with('success', 'تور با موفقیت اضافه شد!');
    }

    public function edit(insidetors $insidetor)
    {
        return view('insidetors.edit', compact('insidetor'));
    }

    public function update(Request $request, insidetors $insidetor)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'target'          => 'required|string|max:255',
            'startpoint'      => 'required|string|max:255',
            'price'           => 'required|numeric',
            'status'          => 'required|string',
            'type'            => 'required|string|max:255',
            'plan'            => 'required|string',
            'duration'        => 'required|string|max:255',
            'hotel_features'  => 'required|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($insidetor->image))) {
                File::delete(public_path($insidetor->image));
            }

            $image = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('insidetorsimage');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $filename);
            $insidetor->image = 'insidetorsimage/' . $filename;
        }

        $insidetor->update([
            'title'          => $request->title,
            'target'         => $request->target,
            'startpoint'     => $request->startpoint,
            'price'          => $request->price,
            'status'         => $request->status,
            'type'           => $request->type,
            'plan'           => $request->plan,
            'duration'       => $request->duration,
            'hotel_features' => $request->hotel_features,
            'image'          => $insidetor->image,
        ]);

        session()->flash('success', 'تور با موفقیت ویرایش شد!');
        return redirect()->route('index.insidetors');
    }

    public function destroy(insidetors $insidetor)
    {
        if (File::exists(public_path($insidetor->image))) {
            File::delete(public_path($insidetor->image));
        }

        $insidetor->delete();

        session()->flash('success', 'تور با موفقیت حذف شد!');
        return redirect()->back();
    }
}
