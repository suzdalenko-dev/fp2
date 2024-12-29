@extends('layout')

@section('title', 'Book Page')

@section('content')
<div class="list_books">
    <h2>Listado de Libros</h2>
</div>
<div class="search_books">
    <div style="padding: 11px;">
        <form class="" method="GET" action="libros.php">
            <input type="submit" value="Nuevo libro" name="add_new_book" class="add_book" />
        </form>
        <div class="books">
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Fecha</th>
                    <th>ISBN</th>
                    <th>Numero páginas</th>
                    <th>Tamaño</th>
                </tr>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book['titulo'] }}</td>
                    <td>{{ $book['autor'] }}</td>
                    <td>{{ $book['genero'] }}</td>
                    <td>{{ $book['fecha_publicacion'] }}</td>
                    <td>{{ $book['isbn'] }}</td>
                    <td>{{ $book['numero_paginas'] }}</td>
                    <td>{{ $book['tamano_libro'] }} MB</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection