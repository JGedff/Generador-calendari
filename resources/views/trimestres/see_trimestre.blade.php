@extends('..master')

@section('main')
<a href="{{ url('/dashboard') }}" class="m-2 btn btn-secondary">Panell</a>
<div class="d-flex flex-wrap m-2">
    <h2 class="w-100">Trimestres</h2>
    <a href="/cur/{{$cursid}}/trimestre/create" class="btn btn-success m-2">Crea un nou trimestre</a>
    <a href="/cur/{{$cursid}}/trimestre" class="btn btn-info m-2">Veure tots els trimestres del curs</a>
    <table class="table table-primary d-flex flex-wrap">
        <thead class="w-100">
            <tr class="d-flex justify-items-between">
                <th class="w-25">Id</th>
                <th class="w-25">Nom</th>
                <th class="w-25">Data inici</th>
                <th class="w-25">Data final</th>
                <th class="w-25">Edita / Elimina</th>
            </tr>
        </thead>
        <tbody class="w-100">
            <tr class="d-flex justify-items-between">
                <td class="w-25">{{$trimestre->id}}</td>
                <td class="w-25">{{$trimestre->nom}}</td>
                <td class="w-25">{{$trimestre->data_inici}}</td>
                <td class="w-25">{{$trimestre->data_final}}</td>
                <td class="w-25">
                    <a href="/cur/{{$cursid}}/trimestre/{{$trimestre->id}}/edit" class="btn btn-primary">Edita</a><br>
                    <form action="/cur/{{$cursid}}/trimestre/{{$trimestre->id}}" method='POST'>
                        @csrf
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-danger">Elimina</a>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection