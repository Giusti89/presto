@extends('layouts.base')
@section('titulo', isset($cliente) ? 'Editar Cliente' : 'Nuevo Cliente') 
@section('nombre', isset($cliente) ? 'Editar Cliente' : 'Nuevo Cliente')

@section('contenido')
    <section>
        <div class="contenedor">
            <link rel="stylesheet" href="{{ asset('css/clientenuevo.css') }}">

            
            <form method="POST" action="{{ isset($cliente) ? route('clientesUpdate', $cliente->id) : route('crearCliente') }}">
                @csrf
                @if(isset($cliente))
                    @method('PUT') 
                @endif
            
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" required id="name" name="name" 
                           value="{{ old('name', $cliente->name ?? '') }}" autofocus autocomplete="name">
                    <label for="">Nombre</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" required id="lastname" name="lastname" 
                           value="{{ old('lastname', $cliente->lastname ?? '') }}" autofocus autocomplete="lastname">
                    <label for="">Apellido</label>
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>
            
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="number" required id="contacto" name="contacto" 
                           value="{{ old('contacto', $cliente->contacto ?? '') }}" required autofocus autocomplete="contacto" maxlength="12">
                    <label for="">Celular</label>
                    <x-input-error :messages="$errors->get('contacto')" class="mt-2" />
                </div>
            
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" required id="email" name="email" 
                           value="{{ old('email', $cliente->email ?? '') }}" required autofocus autocomplete="email">
                    <label for="">Email</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="number" required id="ci" name="ci" 
                           value="{{ old('ci', $cliente->ci ?? '') }}" autofocus autocomplete="ci">
                    <label for="">CI</label>
                    <x-input-error :messages="$errors->get('ci')" class="mt-2" />
                </div>
            
                <button>
                    <p>{{ isset($cliente) ? 'Actualizar' : 'Registrar' }}</p>
                </button>
            
                <div class="forget">
                    <a href="{{ route('dashboard') }}">Regresar</a>
                </div>
            </form>
        </div>
    </section>

@endsection
