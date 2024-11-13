<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cuarto;
use App\Models\Huesped;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $reservas=Reserva::all();
        $cuartos=Cuarto::all();
        $huespedes=Huesped::all();
        return view('reservas.list', compact('reservas','cuartos','huespedes'));
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
        Reserva::create($request->all());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_reserva)
    {
        $reserva = Reserva::findOrFail($id_reserva);
        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('successEdit', 'Se actulizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return redirect()->route('reservas.index')->with('successDelete', 'Se elimino correctamente');
    }
}
