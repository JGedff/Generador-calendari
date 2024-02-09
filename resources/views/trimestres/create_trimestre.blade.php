@extends('..master')

@section('main')
<form action="/cur/{{$cursid}}/trimestre" method='POST'>
    @csrf
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nom" placeholder="" required>
    </div>
    <div class="mb-3">
      <label for="data_inici" class="form-label">Data inici</label>
      <input type="date" class="form-control" name="data_inici" id="data_inici" aria-describedby="data_inici" placeholder="" required>
    </div>
    <div class="mb-3">
      <label for="data_final" class="form-label">Data final</label>
      <input type="date" class="form-control" name="data_final" id="data_final" aria-describedby="data_final" placeholder="" required>
    </div>
    <input type="text" name="cur_id" hidden id="cur_id" value="{{$cursid}}">
    <div class="mb-3 row">
        <div class="offset-sm-4 col-sm-8">
            <button type="submit" class="btn btn-primary">Crea</button>
        </div>
    </div>
</form>
@endsection