<?php

namespace App\Http\Controllers;

use App\Models\inssideholytors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InssideholytorsController extends Controller
{
    public function index()
    {
        $holytors = inssideholytors::all();
        return view('inssideholytors.index', compact('holytors'));
    }

    public function create()
    {
        return view('inssideholytors.create');
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
            'duration'        => 'required|string|max:255',
            'plan'            => 'nullable|string',
            'hotel_features'  => 'nullable|string',
            'image'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest     = public_path('inssideholytors_images');

            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $image->move($dest, $filename);
        }

        inssideholytors::create([
            'title'          => $request->title,
            'target'         => $request->target,
            'startpoint'     => $request->startpoint,
            'price'          => $request->price,
            'status'         => $request->status,
            'type'           => $request->type,
            'duration'       => $request->duration,
            'plan'           => $request->plan,
            'hotel_features' => $request->hotel_features,
            'image'          => $filename,
        ]);

        return redirect()->route('index.inssideholytors')->with('success', 'تور با موفقیت اضافه شد!');
    }

    public function edit(inssideholytors $inssideholytors)
    {
        return view('inssideholytors.edit', compact('inssideholytors'));
    }

    public function update(Request $request, inssideholytors $inssideholytors)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'target'          => 'required|string|max:255',
            'startpoint'      => 'required|string|max:255',
            'price'           => 'required|numeric',
            'status'          => 'required|string',
            'type'            => 'required|string|max:255',
            'duration'        => 'required|string|max:255',
            'plan'            => 'nullable|string',
            'hotel_features'  => 'nullable|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path('inssideholytors_images/' . $inssideholytors->image))) {
                File::delete(public_path('inssideholytors_images/' . $inssideholytors->image));
            }

            $image    = $request->file('image');
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $dest     = public_path('inssideholytors_images');

            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }

            $image->move($dest, $filename);
            $inssideholytors->image = $filename;
        }

        $inssideholytors->update([
            'title'          => $request->title,
            'target'         => $request->target,
            'startpoint'     => $request->startpoint,
            'price'          => $request->price,
            'status'         => $request->status,
            'type'           => $request->type,
            'duration'       => $request->duration,
            'plan'           => $request->plan,
            'hotel_features' => $request->hotel_features,
            'image'          => $inssideholytors->image,
        ]);

        return redirect()->route('index.inssideholytors')->with('success', 'تور با موفقیت ویرایش شد!');
    }

    public function destroy(inssideholytors $inssideholytors)
    {
        if (File::exists(public_path('inssideholytors_images/' . $inssideholytors->image))) {
            File::delete(public_path('inssideholytors_images/' . $inssideholytors->image));
        }

        $inssideholytors->delete();

        return redirect()->route('index.inssideholytors')->with('success', 'تور با موفقیت حذف شد!');
    }
}
