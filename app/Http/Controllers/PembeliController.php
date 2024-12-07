<?php

namespace App\Http\Controllers;


use App\Models\Pembeli;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PembeliController extends Controller
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

        $pembelis = Pembeli::paginate(10);
        return view('pembelis.index', compact('pembelis'));
    }

    /**
     * Show the form for creating a new resource. menampilkan sesuatu
     */
    public function create()
    {

        return view('pembelis.create');
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
        //$pembeli = // buat dapetin id
        $pembeli = pembeli::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],

        ]);


        return redirect()->route('pembelis.index')->with('success', 'pembeli added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembeli $pembeli)
    {
        return view('pembelis.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembeli $pembeli)
    {
        return view('pembelis.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembeli $pembeli)
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
        $pembeli->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
        ]);


        return redirect()->route('pembelis.index')->with('success', 'pembeli updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembeli $pembeli)
    {

        $pembeli->delete();
        return redirect()->route('pembelis.index')->with('success', 'pembeli deleted succesfully.');
    }
}
