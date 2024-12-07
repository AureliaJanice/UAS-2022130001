<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        $cameras = Camera::paginate(20);
        return view('camera.index', compact('cameras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camera.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Camera $camera )
    {
        $validated = $request->validate([
            'camera_name' => 'required | string | max:225',
            'brand' => 'required | string | max:100',
            'price' => 'required | numeric | min:0.0 | max:99999999',
            'quantity' => 'required | integer| min:0',
            'status' => ' required | boolean ',
            'description' => 'required | string | max:255',
            'camera_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
        ]);

        //simpen ke db
        if ($request->hasFile('camera_image')) {
            $request->validate([
                'camera_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
            ]);
            $imagePath = $request->file('camera_image')->store('public/images');

            $validated['camera_image'] = $imagePath;
        }

        $camera::create([
            'camera_name' => $validated['camera_name'],
            'brand' => $validated['brand'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'status' => $validated['status'],
            'description' => $validated['description'],
            'camera_image' => $validated['camera_image']?? null
        ]);

        return redirect()->route('cameras.index')->with('success', 'Camera added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Camera $camera)
    {
        return view('camera$camera.show', compact('camera$camera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camera $camera)
    {
        return view('camera$camera.edit', compact('camera$camera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Camera $camera)
    {
        $validated = $request->validate([
            'camera_name' => 'required | string | max:225',
            'brand' => 'required | string | max:100',
            'price' => 'required | numeric | min:0.0 | max:99999999',
            'quantity' => 'required | integer| min:0',
            'status' => ' required | boolean ',
            'description' => 'required | string | max:255',
            'camera_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
        ]);

        //simpen ke db
        if ($request->hasFile('camera_image')) {
            $request->validate([
                'camera_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
            ]);
            $imagePath = $request->file('camera_image')->store('public/images');

            $validated['camera_image'] = $imagePath;

            //hapus file yg ada
            if ($camera->camera_image){
                Storage::delete([$camera->camera_image]);
            }

            $validated['camera_image'] = $imagePath;
        }

        $camera->update([
            'camera_name' => $validated['camera_name'],
            'brand' => $validated['brand'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'status' => $validated['status'],
            'description' => $validated['description'],
            'camera_image' => $validated['camera_image']?? $camera->camera_image,
        ]);

        return redirect()->route('camera.index')->with('success', 'camera updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camera $camera)
    {
        if ($camera->camera_image) {
            Storage::delete($camera->photo);
        }
        $camera->delete();
        return redirect()->route('camera.index')->with('success', 'camera deleted succesfully.');
    }
}
