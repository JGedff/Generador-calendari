@extends('..master')

@section('main')
<a href="{{ url('/dashboard') }}" class="m-2 btn btn-secondary">Panell</a>
<div class="d-flex flex-wrap m-2">
    <h2 class="w-100">Festius</h2>
    <a href="{{$actualurl}}/create" class="btn btn-success m-2">Crea un nou festiu</a>
    <a href="/cur/{{$festius[0]->cur_id}}" class="btn btn-info m-2">Ves al curs</a>
    <table class="table table-primary d-flex flex-wrap">
        <thead class="w-100">
            <tr class="d-flex justify-items-between">
                <th class="w-25">Id</th>
                <th class="w-25">Nom</th>
                <th class="w-25">Data inici</th>
                <th class="w-25">Data final</th>
                <th class="w-25">Vacances</th>
                <th class="w-25">Veure / Edita / Elimina
            </tr>
        </thead>
        <tbody class="w-100">
            @forelse($festius as $festiu)
                <tr class="d-flex justify-items-between">
                    <td class="w-25">{{$festiu->id}}</td>
                    <td class="w-25">{{$festiu->nom}}</td>
                    <td class="w-25">{{$festiu->data_inici}}</td>
                    <td class="w-25">{{$festiu->data_final}}</td>
                    <td class="w-25">{{$festiu->vacances}}</td>
                    <td class="w-25">
                        <a href="{{$actualurl}}/{{$festiu->id}}" class="btn btn-success">Veure</a><br>
                        <a href="{{$actualurl}}/{{$festiu->id}}/edit" class="btn btn-primary">Edita</a><br>
                        <form action="{{$actualurl}}/{{$festiu->id}}" method='POST'>
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