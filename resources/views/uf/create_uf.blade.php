@extends('..master')

@section('main')
<h2 class="textMargin m-2">Crear uf</h2>
<form action="/cur/{{$cur}}/cicle/{{$cicle}}/modul/{{$modul}}/uf" class="m-2" method="POST">
    @csrf
    <label>Nom: </label>
    <input type="text" class="form-control m-2" name="nom" id="nom" required>
    <div class="mb-3">
      <label for="dies" class="form-label">Dies</label>
      <input type="number" class="form-control w-50" name="dies" id="dies" aria-describedby="dies" min="0" value="0" placeholder="" required>
    </div>
    <input type="text" value="{{$modul}}" name="modul_id" id="modul_id" hidden required>

    <button type="submit" class="btn btn-success mt-2">Enviar</button>
</form> 
@endsection