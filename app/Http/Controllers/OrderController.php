<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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

        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource. menampilkan sesuatu
     */
    public function create()
    {

        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage. melakukan sesuatu
     */
    public function store(Request $request)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'pembeli_id' => 'required',
        ]);


        //feedback data ny dh d simpen
        //dump($validated);
        //$order = // buat dapetin id
        $order = Order::create([
            'pembeli_id' => $validated['pembeli_id'],


        ]);


        return redirect()->route('orders.index')->with('success', 'order added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'pembeli_id' => 'required',
        ]);



        //feedback data ny dh d simpen
        //dump($validated);
        $order->update([
            'pembeli_id' => $validated['pembeli_id'],
        ]);


        return redirect()->route('orders.index')->with('success', 'order updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'order deleted succesfully.');
    }
}
