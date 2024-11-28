<link rel="stylesheet" href="./css/btnmod.css">
{{-- {{ route($rutaEnvio , $dato ) ?? '' }}   --}}
<a  href="" >
    <button type="button" class="btn-modificar" {{$estado ?? ''}} style="background-color: {{$color ?? ''}}">
        {{$nombre}}
    </button>
</a>