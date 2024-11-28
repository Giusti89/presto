@extends('layouts.base')
@section('titulo', 'Nuevo Prestamo')
@section('nombre', 'Realizar Nuevo Prestamo')

@section('contenido')

    <section>
        <div class="contenedor">
            <link rel="stylesheet" href="{{ asset('css/clientenuevo.css') }}">


            <form method="POST" action="{{ route('storePrestamo') }}">
                @csrf


                <div class="mt-4">
                    <x-input-label for="Cliente" :value="__('Cliente')" style="color: blue;font-size:1.5rem" />
                    <select id="cliente" name="cliente" class="selector" required autocomplete="cliente"
                        style="color: black;font-size:1rem;background-color: transparent">
                        <option value=""></option>
                        @foreach ($cliente as $nombre => $id)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('cliente')" class="mt-2" />
                </div>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="number" required id="monto" name="monto" :value="old('monto')" autofocus
                        autocomplete="monto">
                    <label for="">Monto</label>
                    <x-input-error :messages="$errors->get('monto')" class="mt-2" />
                </div>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="number" required id="interes" name="interes" :value="old('interes')" autofocus
                        autocomplete="interes">
                    <label for="">Interes</label>
                    <x-input-error :messages="$errors->get('interes')" class="mt-2" />
                </div>

                <div class="datos">
                    <label for="fecha" style="color: blue;font-size:1rem">Fecha de pago: </label>
                    <input type="date" required id="fecha" name="fecha"
                        style="color: blue;font-size:1rem;background-color: transparent">
                </div>

                <button style="margin-top: 40px;">
                    <p>Registrar</p>
                </button>

                <div class="forget">
                    <a href="{{ route('dashboard') }}">Regresar</a>
                </div>
            </form>
        </div>
    </section>


@endsection
