<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;

use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;

class ClienteController extends Controller
{
    public function index() {}

    public function inicio()
    {
        try {
            $usuarios = cliente::all();

            return view('/dashboard')->with('usuarios', $usuarios);
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
            return view('clientes.create');
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
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'string|max:255|regex:/^[a-zA-Z\s]+$/',
            'contacto' => 'required|numeric|max_digits:12|min:1',
            'ci' => 'numeric|min_digits:1|max_digits:15',
            'email' => 'required|email',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',

            'lastname.string' => 'El apellido debe ser una cadena de texto.',
            'lastname.max' => 'El apellido no debe exceder los 255 caracteres.',
            'lastname.regex' => 'El apellido solo puede contener letras y espacios.',

            'contacto.required' => 'El contacto es obligatorio.',
            'contacto.numeric' => 'El contacto debe ser un número.',
            'contacto.min' => 'El contacto debe ser un número positivo.',
            'contacto.max_digits' => 'El contacto no debe exceder los 12 dígitos.',


            'ci.numeric' => 'El NIT debe ser numérico.',
            'ci.max_digits' => 'El NIT no debe exceder los 12 dígitos.',
            'ci.min_digits' => 'El NIT debe ser un número positivo.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',

        ]);

        try {
            $user = Auth::user();
            $cliente = new Cliente();
            $cliente->name = $request->name;
            $cliente->lastname = $request->lastname;
            $cliente->contacto = $request->contacto;
            $cliente->ci = $request->ci;
            $cliente->email = $request->email;
            $cliente->user_id = $user->id;
            $cliente->save();

            return redirect()->route('dashboard')->with('msj', 'realizado');
        } catch (\Throwable $th) {

            dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            return view('clientes.create', compact('cliente'));
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with(['msj' => 'fallo']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all()); // Actualizar datos
            return redirect()->route('dashboard')->with('msj', 'ok');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with(['msj' => 'fallo']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);

            $cliente->delete();
            return redirect()->route('dashboard')->with('msj', 'eliminado');
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with(['msj' => 'prohibido']);
        }
    }
}
