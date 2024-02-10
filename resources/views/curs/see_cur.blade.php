@extends('..master')

@section('main')
<a href="{{ url('/dashboard') }}" class="m-2 btn btn-secondary">Panell</a>
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
                <tr>
                <td class="bg-white d-flex flex-wrap m-4">
                    <a href="/cur/{{$cur->id}}/trimestre"><h3>Trimestres</h3></a>
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Data inici</th>
                                <th>Data final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cur->trimestres as $trimestre)
                                <tr>
                                    <td>{{$trimestre->id}}</td>
                                    <td>{{$trimestre->nom}}</td>
                                    <td>{{$trimestre->data_inici}}</td>
                                    <td>{{$trimestre->data_final}}</td>
                                </tr>
                            @empty
                                <p>Sense trimestres</p>
                            @endforelse
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="bg-white d-flex flex-wrap m-4">
                    <a href="/cur/{{$cur->id}}/festiu"><h3>Festius</h3></a>
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Data inici</th>
                                <th>Data final</th>
                                <th>Vacances</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cur->festius as $festiu)
                                <tr>
                                    <td>{{$festiu->id}}</td>
                                    <td>{{$festiu->nom}}</td>
                                    <td>{{$festiu->data_inici}}</td>
                                    <td>{{$festiu->data_final}}</td>
                                    <td>{{$festiu->vacances}}</td>
                                </tr>
                            @empty
                                <p>Sense festius</p>
                            @endforelse
                        </tbody>
                    </table>
                </td>
            </tr>
            @empty
                <p>Sense dades</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection