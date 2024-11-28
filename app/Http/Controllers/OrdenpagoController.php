<?php

namespace App\Http\Controllers;

use App\Models\ordenpago;
use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenpagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $orden = ordenpago::all();

            return view('/ordenpago.index', compact('orden'));
        } catch (\Throwable $th) {
            return response()->view('errors.500', [], 500);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ordenpago $ordenpago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pago($id)
    {
        try {
            $pago = ordenpago::findOrFail($id);
            $monto = pago::where('ordenpago_id', $id)->get();

            return view('ordenpago.pago', compact('pago', 'monto'));
        } catch (\Throwable $th) {
            return response()->view('errors.500', [], 500);
        }
    }

    public function pagar(Request $request, $id)
    {
        $request->validate([
            'pago' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        try {
           $pago = new pago();
           $pago->pago = $request->pago;
           $pago->fecha = $request->fecha;
           $pago->ordenpago_id = $id;

           $ordenPago = ordenpago::findOrFail($id);

           if ($ordenPago->saldo == $request->pago) {
            $ordenPago->estadopago_id = 1;
        }

        if ($ordenPago->saldo >= $request->pago) {
            $ordenPago->cuenta = $ordenPago->cuenta + $request->pago;
            $ordenPago->saldo = $ordenPago->saldo - $request->pago;
            $pago->save();
            $ordenPago->update();
            return redirect()->route('pagoShow', $id)->with('msj', 'ok');
        }else{
            return redirect()->route('ordepagoIndex')->with('msj', 'error');
        }

        } catch (\Throwable $th) {
            return redirect()->route('ordepagoIndex')->with('msj', 'error');
        }
        

        

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ordenpago $ordenpago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ordenpago $ordenpago)
    {
        //
    }
}
