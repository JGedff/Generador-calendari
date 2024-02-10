@extends('..master')

@section('header')
<div>
    <nav class="navbar navbar-expand-sm backgroundcolor">
        <div class="container">
            <a class="navbar-brand textcolor">Creador de calendaris</a>
            <!-- Otros elementos de la barra de navegación aquí -->
        </div>
    </nav>
</div>
<h3 class="textMargin">Crea el teu calendari</h3>
@endsection

@section('main')
<div class="textMargin">Introdueix les dades al formulari per crear el teu calendari</div>
<form action="/dashboard" method="POST">
    @csrf
    <table>
        <tr>
            <td><label>Curs: </label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="cursAnys" required></th>
        </tr>
        <tr>
            <td><label>Data d'inici: </label>
                <input type="date" class="form-control" name="description" id="description" aria-describedby="iniciCurs" required></th>
        </tr>
        <tr>
            <td><label>Data Finalització: </label>
                <input type="date" class="form-control" name="director" id="director" aria-describedby="finalCurs" required></th>
        </tr>
        <tr><td><label>TRimestre</label></td></tr>
        <tr>
            <td><label>Data inici Trimestre: </label>
                <input type="date" class="form-control" name="trimestre" id="trimestre" aria-describedby="trimestre" required></th>
        </tr>

        <tr>
            <td><label>Data finalització Trimestre: </label>
                <input type="date" class="form-control" name="trimestre" id="trimestre" aria-describedby="trimestre" required></th>
        </tr>

        <tr>
            <td><label >Festius:</label>
            <input type="date" class="form-control" name="festius" id="festius" aria-describedby="festius" required></th>
        </tr>
    </table>
    <input type="submit" value="Enviar">
</form> 
@endsection