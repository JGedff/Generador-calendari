@extends('..master')

@section('main')
<h2 class="textMargin m-2">Crear modul</h2>
<form action="/cur/{{$cur_id}}/cicle/{{$cicle_id}}/modul" class="m-2" method="POST">
    @csrf
    <label>Nom: </label>
    <input type="text" class="form-control m-2" name="nom" id="nom" required>
    <input type="text" class="form-control m-2" name="cicle_id" id="cicle_id" value="{{$cicle_id}}" hidden required>
    
    <button type="submit" class="btn btn-success mt-2">Enviar</button>
</form> 
@endsection