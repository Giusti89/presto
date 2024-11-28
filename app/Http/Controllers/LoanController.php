<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\loan;
use App\Models\ordenpago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $usuarios = Loan::all();

            return view('/prestamo.index')->with('usuarios', $usuarios);
        } catch (\Throwable $th) {
            return response()->view('errors.500', [], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $user = Auth::user();
            $cliente = $user->clientes->pluck('id', 'name');

            return view('prestamo.nuevo', compact('cliente'));
        } catch (\Throwable $th) {
            return response()->view('errors.500', [], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|max_digits:10|min:0',
            'interes' => 'required|numeric|max_digits:10|min:0',
            'fecha' => 'required|date|after_or_equal:today',

        ], [
            'monto.required' => 'El monto es obligatoria.',
            'monto.numeric' => 'El monto debe ser un número.',
            'monto.max_digits' => 'El monto no debe exceder los 10 dígitos.',
            'monto.min' => 'El monto debe ser un número positivo.',

            'interes.required' => 'El interes es obligatoria.',
            'interes.numeric' => 'El interes debe ser un número.',
            'interes.max_digits' => 'El interes no debe exceder los 10 dígitos.',
            'interes.min' => 'El interes debe ser un número positivo.',

            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'fecha.after_or_equal' => 'La fecha debe ser hoy o una fecha futura.',
        ]);
        $prestamo = new loan();

        $prestamo->cliente_id = $request->cliente;
        $prestamo->monto = $request->monto;
        $prestamo->interes = $request->interes;
        $prestamo->plazofinal = $request->fecha;


        $prestamo->save();
 
        $montointeres=( $prestamo->monto * $prestamo->interes)/100;
        $totalpago= $montointeres+$prestamo->monto;

        $ordenpago = new ordenpago();

        $ordenpago->total=$totalpago;
        $ordenpago->saldo=$totalpago;
        $ordenpago->loan_id=$prestamo->id;

        $ordenpago->save();
        return redirect()->route('inicioPrestamos')->with('msj', 'realizado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {

            $loans = Loan::where('cliente_id', $id)->get();    
                 
            return view('prestamo.show', compact('loans'));

        } catch (\Throwable $th) {
            return response()->view('errors.500', [], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loan $loan)
    {
        //
    }
}
