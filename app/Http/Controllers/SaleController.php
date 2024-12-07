<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
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

        $sales = sale::paginate(10);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource. menampilkan sesuatu
     */
    public function create()
    {

        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage. melakukan sesuatu
     */
    public function store(Request $request)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'penjual_id' => 'required',
        ]);


        //feedback data ny dh d simpen
        //dump($validated);
        //$sale = // buat dapetin id
        $sale = Sale::create([
            'penjual_id' => $validated['penjual_id'],


        ]);


        return redirect()->route('sales.index')->with('success', 'sale added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'penjual_id' => 'required',
        ]);



        //feedback data ny dh d simpen
        //dump($validated);
        $sale->update([
            'penjual_id' => $validated['penjual_id'],
        ]);


        return redirect()->route('sales.index')->with('success', 'sale updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {

        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'sale deleted succesfully.');
    }
}
