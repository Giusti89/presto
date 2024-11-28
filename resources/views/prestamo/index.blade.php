@extends('layouts.base')
@section('titulo', 'Prestamos')
@section('nombre', 'Prestamos')
@section('contenido')

    <link rel="stylesheet" href="./css/dashbord.css">
    <div class="table-container">

        <table>
            <thead>
                <tr>
                   
                    <th>cliente</th>
                    <th>monto</th>
                    <th>interes</th>
                    <th>estado pago</th>
                    <th>plazo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                       
                        <td class="filas-tabla">
                            {{ $usuario->cliente->name }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->monto }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->interes }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->estadopago->nombre }}
                        </td>

                        <td class="filas-tabla">
                            {{ \Carbon\Carbon::parse($usuario->plazofinal)->format('d/m/Y') }}
                            
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
