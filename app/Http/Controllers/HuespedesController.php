<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Huesped;

class HuespedesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $huespedes = Huesped::all();
        return view('huespedes.list', compact('huespedes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Huesped::create($request->all());
        return redirect()->back()->with('success', 'Se registro correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_huesped)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_huesped)
    {
        $huesped = Huesped::findOrFail($id_huesped);
        $huesped->update($request->all());
        return redirect()->route('huespedes.index')->with('successEdit', 'Se actulizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $huesped = Huesped::findOrFail($id);
        $huesped->delete();
        return redirect()->route('huespedes.index')->with('successDelete', 'Se elimino correctamente');
    }
}
