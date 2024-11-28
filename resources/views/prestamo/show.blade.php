@extends('layouts.base')
@section('titulo', 'Ver prestamos')
@section('nombre', 'Verificación de prestamos')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/dashbord.css') }}">

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>Monto</th>
                    <th>Interes</th>
                    <th>Inicio prestamo</th>
                    <th>Plazo final</th>
                    <th>Monto total de pago</th>
                    <th>Estado del pago</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $usuario)
                    <tr>
                        <td class="filas-tabla">
                            {{ $usuario->monto }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->interes }}
                        </td>
                        <td class="filas-tabla">
                            {{ \Carbon\Carbon::parse($usuario->crearted_at)->format('d/m/Y') }}
                        </td>
                        <td class="filas-tabla">
                            {{ \Carbon\Carbon::parse($usuario->plazofinal)->format('d/m/Y') }}
                        </td>
                        <td class="filas-tabla">
                            {{ (($usuario->monto * $usuario->interes)/100)+$usuario->monto }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->estadopago->nombre }}
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


@endsection
