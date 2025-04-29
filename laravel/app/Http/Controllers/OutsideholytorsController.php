<?php

namespace App\Http\Controllers;

use App\Models\outsideholytors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OutsideholytorsController extends Controller
{
    public function index()
    {
        $outsideholytors = outsideholytors::all();
        return view('outsideholytors.index', compact('outsideholytors'));
    }

    public function create()
    {
        return view('outsideholytors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'target'         => 'required|string|max:255',
            'startpoint'     => 'required|string|max:255',
            'price'          => 'required|numeric',
            'status'         => 'required|string|max:255',
            'type'           => 'required|string|max:255',
            'plan'           => 'required|string',
            'duration'       => 'required|string|max:255',
            'hotel_features' => 'required|string',
            'image'          => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest     = public_path('outsideholytor_images');

            if (!File::isDirectory($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $image->move($dest, $filename);
            $imagePath = 'outsideholytor_images/' . $filename;
        }

        outsideholytors::create([
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

        return redirect()->route('outsideholytors.index')->with('success', 'تور با موفقیت اضافه شد!');
    }

    public function edit(outsideholytors $outsideholytor)
    {
        return view('outsideholytors.edit', compact('outsideholytor'));
    }

    public function update(Request $request, outsideholytors $outsideholytor)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'target'         => 'required|string|max:255',
            'startpoint'     => 'required|string|max:255',
            'price'          => 'required|numeric',
            'status'         => 'required|string|max:255',
            'type'           => 'required|string|max:255',
            'plan'           => 'required|string',
            'duration'       => 'required|string|max:255',
            'hotel_features' => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($outsideholytor->image))) {
                File::delete(public_path($outsideholytor->image));
            }

            $image    = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest     = public_path('outsideholytor_images');

            if (!File::isDirectory($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $image->move($dest, $filename);
            $outsideholytor->image = 'outsideholytor_images/' . $filename;
        }

        $outsideholytor->update([
            'title'          => $request->title,
            'target'         => $request->target,
            'startpoint'     => $request->startpoint,
            'price'          => $request->price,
            'status'         => $request->status,
            'type'           => $request->type,
            'plan'           => $request->plan,
            'duration'       => $request->duration,
            'hotel_features' => $request->hotel_features,
            'image'          => $outsideholytor->image,
        ]);

        return redirect()->route('outsideholytors.index')->with('success', 'تور با موفقیت ویرایش شد!');
    }

    public function destroy(outsideholytors $outsideholytor)
    {
        if (File::exists(public_path($outsideholytor->image))) {
            File::delete(public_path($outsideholytor->image));
        }

        $outsideholytor->delete();

        return redirect()->route('outsideholytors.index')->with('success', 'تور با موفقیت حذف شد!');
    }
}
