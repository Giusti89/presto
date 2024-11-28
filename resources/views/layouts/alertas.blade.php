 <!-- mensajes de confirmacion -->
 @if (session('msj') == 'realizado')
 <script>
     Swal.fire({
         title: "Exito",
         text: "Se realizo con exito.",
         icon: "success"
     });
 </script>
@endif

 @if (session('msj') == 'eliminado')
 <script>
     Swal.fire({
         title: "Eliminado",
         text: "Se elimino con exito.",
         icon: "success"
     });
 </script>
@endif

@if (session('msj') == 'fallo')
 <script>
     Swal.fire({
         title: "No se puede realizar la solicitud",
         text: "Su archivo no ha sido eliminado.",
         icon: "warning"
     });
 </script>
@endif

@if (session('msj') == 'cambio')
 <script>
     Swal.fire({
         title: "Correcto",
         text: "Su solicitud a sido ejecutada.",
         icon: "success"
     });
 </script>
@endif

@if (session('msj') == 'prohibido')
 <script>
     Swal.fire({
         title: "NO TIENES LOS PERMISOS",
         text: "Su solicitud no puede ser ejecutada.",
         icon: "warning"
     });
 </script>
@endif

@if (session('msj') == 'error')
 <script>
     Swal.fire({
         title: "OPERACION NO PERMITIDA",
         text: "Su solicitud no puede ser ejecutada.",
         icon: "warning"
     });
 </script>
@endif

<!-- mensajes de confirmacion -->