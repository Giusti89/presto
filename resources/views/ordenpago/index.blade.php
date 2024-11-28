@extends('layouts.base')
@section('titulo', 'Orden pagos')
@section('nombre', 'Orden Pagos')
@section('contenido')
    <link rel="stylesheet" href="./css/dashbord.css">
    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Total</th>
                    <th>Cuenta</th>
                    <th>Saldo</th>
                    <th>Prestamo id</th>
                    <th>Realizar pago</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orden as $pago)
                    <tr>
                        <td class="filas-tabla">
                            {{ $pago->id }}
                        </td>
                        <td class="filas-tabla">
                            {{ $pago->total }}
                        </td>
                        <td class="filas-tabla">
                            {{ $pago->cuenta }}
                        </td>
                        <td class="filas-tabla">
                            {{ $pago->saldo }}
                        </td>
                        <td class="filas-tabla">
                            {{ $pago->loan_id }}
                        </td>
                        <td class="filas-tabla">
                            <x-layouts.btnenviodat class="modificar" rutaEnvio="pagoShow" dato="{{  $pago->id }}"
                                nombre="Pagar" color="#12a14b">
                            </x-layouts.btnenviodat>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.eli').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                title: "¿Estas seguro de eliminar este cliente?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar"
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
