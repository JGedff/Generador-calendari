@extends('..master')

@section('main')
<div class="d-flex flex-wrap m-2">
    <h2 class="w-100">Curs</h2>
    <a href="/cur/create" class="btn btn-success m-2">Crea un nou curs</a>
    <table class="table table-primary d-flex flex-wrap">
        <thead class="w-100">
            <tr class="d-flex justify-items-between">
                <th class="w-25">Id</th>
                <th class="w-25">Nom</th>
                <th class="w-25">Data inici</th>
                <th class="w-25">Data final</th>
                <th class="w-25">Veure / Edita / Elimina
            </tr>
        </thead>
        <tbody class="w-100">
            @forelse($curs as $cur)
                <tr class="d-flex justify-items-between">
                    <td class="w-25">{{$cur->id}}</td>
                    <td class="w-25">{{$cur->nom}}</td>
                    <td class="w-25">{{$cur->data_inici}}</td>
                    <td class="w-25">{{$cur->data_final}}</td>
                    <td class="w-25">
                        <a href="/cur/{{$cur->id}}" class="btn btn-success">Veure</a><br>
                        <a href="/cur/{{$cur->id}}/edit" class="btn btn-primary">Edita</a><br>
                        <form action="/cur/{{$cur->id}}" method='POST'>
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-danger">Elimina</a>
                        </form>
                    </td>
                </tr>
            @empty
                <p>Sense dades</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection