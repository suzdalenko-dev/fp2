@extends('layout')

@section('title', 'Create Book Page')

@section('content')
<div class="create_book">
    <h2>Crear Libro</h2>
</div>
<div class="new_form_book">
    <form action="fcrear.php" method="POST">
        <div class="form-row">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" placeholder="Título del Libro" class="input_add">
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" name="author" placeholder="Autor del Libro" class="input_add">
            </div>
        </div>
        <div class="three_columns">
            <div class="form-group">
                <label for="gender">Género</label>
                <select name="gender" class="input_add">
                    <option value="Novela">Novela</option>
                    <option value="Terror">Terror</option>
                    <option value="Romance">Romance</option>
                    <option value="Ciencia Ficción">Ciencia Ficción</option>
                    <option value="Fantasía">Fantasía</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Drama">Drama</option>
                    <option value="Otros">Otros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_publication">Fecha de Publicacíon</label>
                <input type="date" name="date_publication" placeholder="Fecha de Publicacíon" class="input_add">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" placeholder="ISBN" class="input_add">
            </div>
        </div>
        <div class="three_columns">
            <div class="form-group">
                <label for="page_number">Número de Páginas</label>
                <input type="text" name="page_number" placeholder="Numero de paginas" class="input_add">
            </div>
            <div class="form-group">
                <label for="book_size">Tamaño del Libro</label>
                <input type="text" name="book_size" placeholder="Tamaño del Libro" class="input_add">
            </div>
        </div>
        <div>
            {{ $message }}
        </div>
        <div class="finish">
            <input type="submit" name="create" value="Crear" class="input_add_button create">
            <input type="submit" name="clear" value="Limpiar" class="input_add_button clear">
            <input type="submit" name="back" value="Volver" class="input_add_button back">
        </div>
    </form>
</div>
@endsection