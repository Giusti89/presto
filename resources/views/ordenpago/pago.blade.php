@extends('layouts.base')
@section('titulo', 'Pago')
@section('nombre', 'Realizar Pago')
@section('contenido')

<section>
    <link rel="stylesheet" href="{{ asset('css/pagos.css') }}">
    <section>
        <h1>Monto de la Deuda</h1>
        <h2> <b> TOTAL:{{ $pago->total }}</b> / <b style="color: red">  SALDO:{{ $pago->saldo }}</b></h2>
    </section>
    <section>
        <h1>Pagos realizados</h1>
        <table>
            <thead>
                <tr>
                    
                    <th>Pago</th>
                    <th>Fecha de pagos</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($monto as $item)
                    <tr>
                       
                        <td class="filas-tabla">
                            {{ $item->pago }}
                        </td>
                        <td class="filas-tabla">
                            {{ $item->fecha }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section>
        
      <form method="POST" action="{{ route('pagar', ['id' => $pago->id]) }}">
            @csrf
            <h1>Importe</h1>

            <div class="frm">

                

                <div class="datos">
                    <label for="pago">Importe: </label>
                    <input type="decimal" required id="pago" name="pago" style="background-color: transparent;">
                </div>

                <div class="datos">
                    <label for="fecha">Fecha: </label>
                    <input type="date" required id="fecha" name="fecha" style="background-color: transparent;">
                </div>

            </div>
            @if ($pago->saldo == 0)
                <div class="forget">
                    <a href="{{ route('ordepagoIndex') }}">Regresar</a>
                </div>
            @else
                <button class="registrar">
                    <p>Registrar</p>
                </button>
            @endif

        </form>
    </section>
    {{-- @if ($ordenpago->saldo != 0)
        <div class="forget">
            <a href="{{ route('pagoIndex') }}">Regresar</a>
        </div>
    @endif --}}


</section>


@endsection
