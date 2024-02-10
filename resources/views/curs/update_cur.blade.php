@extends('..master')

@section('main')
<a href="{{ url('/dashboard') }}" class="m-2 btn btn-secondary">Panell</a>
<h2 class="m-2 w-100">Actualitzar curs</h2>
<a href="/cur/{{$cur->id}}" class="btn btn-info m-2">Ves al curs actual</a>
<a href="/cur" class="btn btn-info m-2">Veure tots els cursos</a>
<form action="/cur/{{$cur->id}}" class="m-2" method='POST'>
    @csrf
    <input type="hidden" name="_method" value="PATCH" />
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text"
        class="form-control w-50" name="nom" id="nom" aria-describedby="nom" value="{{$cur->nom}}" required>
    </div>
    <div class="mb-3">
      <label for="data_inici" class="form-label">Data inici</label>
      <input type="text"
        class="form-control w-50" name="data_inici" id="data_inici" aria-describedby="data_inici" value="{{$cur->data_inici}}" required>
    </div>
    <div class="mb-3">
      <label for="data_final" class="form-label">Data final</label>
      <input type="text"
        class="form-control w-50" name="data_final" id="data_final" aria-describedby="data_final" value="{{$cur->data_final}}" required>
    </div>
    <div class="mb-3 row">
        <div class="offset-sm-4 col-sm-8">
            <button type="submit" class="btn btn-primary">Actualitza</button>
        </div>
    </div>
</form>
@endsection