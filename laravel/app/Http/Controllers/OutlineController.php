<?php

namespace App\Http\Controllers;

use App\Models\Outline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OutlineController extends Controller
{
    public function index()
    {
        $outlines = Outline::all();
        return view('outlinetors.index', compact('outlines'));
    }

    public function create()
    {
        return view('outlinetors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'target'     => 'required|string|max:255',
            'startpoint' => 'required|string|max:255',
            'price'      => 'required|numeric',
            'status'     => 'required|string',
            'type'       => 'required|string|max:255',
            'duration'   => 'required|string|max:255',
            'plan'       => 'nullable|string',
            'hotel_features' => 'nullable|string',
            'image'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest     = public_path('outline_images');

            if (!File::isDirectory($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $image->move($dest, $filename);
            $imagePath = 'outline_images/' . $filename;
        }

        Outline::create([
            'title'         => $request->title,
            'target'        => $request->target,
            'startpoint'    => $request->startpoint,
            'price'         => $request->price,
            'status'        => $request->status,
            'type'          => $request->type,
            'duration'      => $request->duration,
            'plan'          => $request->plan,
            'hotel_features'=> $request->hotel_features,
            'image'         => $imagePath,
        ]);

        return redirect()->route('Outlinetors.index')->with('success', 'تور با موفقیت اضافه شد!');
    }

    public function edit(Outline $outline)
    {
        return view('outlinetors.edit', compact('outline'));
    }

    public function update(Request $request, Outline $outline)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'target'        => 'required|string|max:255',
            'startpoint'    => 'required|string|max:255',
            'price'         => 'required|numeric',
            'status'        => 'required|string',
            'type'          => 'required|string|max:255',
            'duration'      => 'required|string|max:255',
            'plan'          => 'nullable|string',
            'hotel_features'=> 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (File::exists(public_path($outline->image))) {
                File::delete(public_path($outline->image));
            }

            $image    = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest     = public_path('outline_images');

            if (!File::isDirectory($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $image->move($dest, $filename);
            $outline->image = 'outline_images/' . $filename;
        }

        $outline->update([
            'title'         => $request->title,
            'target'        => $request->target,
            'startpoint'    => $request->startpoint,
            'price'         => $request->price,
            'status'        => $request->status,
            'type'          => $request->type,
            'duration'      => $request->duration,
            'plan'          => $request->plan,
            'hotel_features'=> $request->hotel_features,
            'image'         => $outline->image,
        ]);

        return redirect()->route('Outlinetors.index')->with('success', 'تور با موفقیت ویرایش شد!');
    }

    public function destroy(Outline $outline)
    {
        // Delete image if exists
        if (File::exists(public_path($outline->image))) {
            File::delete(public_path($outline->image));
        }

        $outline->delete();

        return redirect()->route('Outlinetors.index')->with('success', 'تور با موفقیت حذف شد!');
    }
}
