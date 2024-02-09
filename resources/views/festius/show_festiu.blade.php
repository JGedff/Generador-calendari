@extends('..master')

@section('main')
<div class="d-flex flex-wrap m-2">
    <h2 class="w-100">Festius</h2>
    <a href="/cur/{{$cursid}}/festiu/create" class="btn btn-success m-2">Crea un nou festiu</a>
    <table class="table table-primary d-flex flex-wrap">
        <thead class="w-100">
            <tr class="d-flex justify-items-between">
                <th class="w-25">Id</th>
                <th class="w-25">Nom</th>
                <th class="w-25">Data inici</th>
                <th class="w-25">Data final</th>
                <th class="w-25">Vacances</th>
                <th class="w-25">Edita / Elimina</th>
            </tr>
        </thead>
        <tbody class="w-100">
            <tr class="d-flex justify-items-between">
                <td class="w-25">{{$festiu->id}}</td>
                <td class="w-25">{{$festiu->nom}}</td>
                <td class="w-25">{{$festiu->data_inici}}</td>
                <td class="w-25">{{$festiu->data_final}}</td>
                <td class="w-25">{{$festiu->vacances}}</td>
                <td class="w-25">
                    <a href="/cur/{{$cursid}}/festiu/{{$festiu->id}}/edit" class="btn btn-primary">Edita</a><br>
                    <form action="/cur/{{$cursid}}/festiu/{{$festiu->id}}" method='POST'>
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