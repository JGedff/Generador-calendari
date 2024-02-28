@extends('..master')

@section('main')
<h2 class="textMargin m-2">Crear cicle</h2>
<form action="/cur/{{$curId}}/cicle" class="m-2" method="POST">
    @csrf
    <label>Nom: </label>
    <input type="text" class="form-control m-2" name="nom" id="nom" required>
    <input type="text" class="form-control m-2" name="cur_id" id="cur_id" value="{{$curId}}" hidden required>
    
    <button type="submit" class="btn btn-success mt-2">Enviar</button>
</form> 
@endsection