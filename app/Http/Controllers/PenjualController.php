<?php

namespace App\Http\Controllers;


use App\Models\Penjual;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource. list tabel
     */
    public function index()
    {

        $penjuals = Penjual::paginate(10);
        return view('penjuals.index');
    }

    /**
     * Show the form for creating a new resource. menampilkan sesuatu
     */
    public function create()
    {

        return view('penjuals.create');
    }

    /**
     * Store a newly created resource in storage. melakukan sesuatu
     */
    public function store(Request $request)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'name' => 'required | string | max:225',
            'address' => 'required | string | max:225',
            'phone_number' => 'string | max:13',
            'email' => 'email | string | max:225',
        ]);


        //feedback data ny dh d simpen
        //dump($validated);
        //$penjual = // buat dapetin id
        $penjual = Penjual::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],

        ]);


        return redirect()->route('penjuals.index')->with('success', 'penjual added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjual $penjual)
    {
        return view('penjuals.show', compact('penjual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjual $penjual)
    {
        return view('penjuals.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjual $penjual)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'name' => 'required | string | max:225',
            'address' => 'required | string | max:225',
            'phone_number' => 'string | max:13',
            'email' => 'email | string | max:225',
        ]);



        //feedback data ny dh d simpen
        //dump($validated);
        $penjual->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
        ]);


        return redirect()->route('penjuals.index')->with('success', 'penjual updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjual $penjual)
    {

        $penjual->delete();
        return redirect()->route('penjuals.index')->with('success', 'penjual deleted succesfully.');
    }
}
