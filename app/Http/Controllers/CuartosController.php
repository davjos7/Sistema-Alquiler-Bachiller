<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuarto;

class CuartosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuartos = Cuarto::all();
        return view('cuartos.list', compact('cuartos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cuartos.form-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cuarto::create($request->all());
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
    public function edit(string $id_cuarto)
    {
        $cuarto= Cuarto::findOrFail($id_cuarto);
        return view('cuartos.edit', compact('cuarto')); // compact es para llamar a la variable
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_cuarto)
    {
        $cuarto= Cuarto::findOrFail($id_cuarto);
        $cuarto->update($request->all());
        return redirect()->route('cuartos.index')->with('successEdit', 'Se actulizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuarto = Cuarto::findOrFail($id);
        $cuarto->delete();
        return redirect()->route('cuartos.index')->with('successDelete', 'Se elimino correctamente');
    }
}
