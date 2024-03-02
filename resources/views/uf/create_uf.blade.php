@extends('..master')

@section('main')
<h2 class="textMargin m-2">Crear uf</h2>
<form action="/cur/{{$cur}}/cicle/{{$cicle}}/modul/{{$modul}}/uf" class="m-2" method="POST">
    @csrf
    <label>Nom: </label>
    <input type="text" class="form-control m-2" name="nom" id="nom" required>

    <div class="mb-3">
      <label for="data_inici" class="form-label">Data inici</label>
      <input type="date" class="form-control w-50" name="data_inici" id="data_inici" aria-describedby="data_inici" placeholder="" required>
    </div>
    <div class="mb-3">
      <label for="data_final" class="form-label">Data final</label>
      <input type="date" class="form-control w-50" name="data_final" id="data_final" aria-describedby="data_final" placeholder="" required>
    </div>
    <input type="text" value="{{$modul}}" name="modul_id" id="modul_id" hidden required>

    <button type="submit" class="btn btn-success mt-2">Enviar</button>
</form> 
@endsection