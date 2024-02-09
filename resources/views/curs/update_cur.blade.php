@extends('..master')

@section('main')
<form action="/cur/{{$cur->id}}" method='POST'>
    @csrf
    <input type="hidden" name="_method" value="PATCH" />
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text"
        class="form-control" name="nom" id="nom" aria-describedby="nom" value="{{$cur->nom}}" required>
    </div>
    <div class="mb-3">
      <label for="data_inici" class="form-label">Data inici</label>
      <input type="text"
        class="form-control" name="data_inici" id="data_inici" aria-describedby="data_inici" value="{{$cur->data_inici}}" required>
    </div>
    <div class="mb-3">
      <label for="data_final" class="form-label">Data final</label>
      <input type="text"
        class="form-control" name="data_final" id="data_final" aria-describedby="data_final" value="{{$cur->data_final}}" required>
    </div>
    <div class="mb-3 row">
        <div class="offset-sm-4 col-sm-8">
            <button type="submit" class="btn btn-primary">Actualitza</button>
        </div>
    </div>
</form>
@endsection