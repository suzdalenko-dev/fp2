@extends('layout') 

@section('title', 'Instalation Page')

@section('content')
<div class="instalation">
    <h2>Instalación</h2>
    <form method="GET" action="instalacion.php">
        <input type="submit" value="Instalar Datos de Ejemplo" name="instalacion" class="input_instalacion" />
    </form>
</div>
@endsection