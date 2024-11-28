@extends('layouts.base')
@section('titulo', 'Inicio')
@section('nombre', 'Clientes')
@section('contenido')
    <link rel="stylesheet" href="./css/dashbord.css">
    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Contacto</th>
                    <th>Ver prestamos</th>
                    <th>Modificación</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="filas-tabla">
                            {{ $usuario->name }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->lastname }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->email }}
                        </td>
                        <td class="filas-tabla">
                            {{ $usuario->contacto }}
                        </td>

                        <td class="filas-tabla">
                            <x-layouts.btnenviodat class="modificar" rutaEnvio="showPrestamo" dato="{{  $usuario->id }}"
                                nombre="Ver" color="orange">
                            </x-layouts.btnenviodat>
                        </td>
                        <td class="filas-tabla">
                            <x-layouts.btnenviodat class="modificar" rutaEnvio="clientesEdit" dato="{{  $usuario->id }}"
                                nombre="Modificar" color="green">
                            </x-layouts.btnenviodat>
                        </td>
                        <td class="filas-tabla">
                            <div>
                                <form class="eli" action="{{ route('elicliente', $usuario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-layouts.btnelim contenido="Eliminar" color="red">
                                    </x-layouts.btnelim>
                                </form>
                            </div>
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
