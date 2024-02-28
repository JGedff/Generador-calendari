@extends('..master')

@section('header')
<h2>Introdueix les dades del calendari</h2>
@endsection

@section('main')
<form method="POST" action="/calendari">
    @csrf

    <div>
        <select name="curs" id="curs">
            @foreach($curs as $cur)
                <option value="{{$cur->nom}}">{{$cur->nom}}</option>
            @endforeach
        </select>
        <a class="btn btn-info" href="/cur/create" id="addCurs" >
            Afegir curs
        </a>
    </div>
    
    <div>
        <select name="cicle-modul" id="cicle-modul">
            @foreach($cicleModuls as $cicleModul)
                <option value="{{$cicleModul['cicle_id']}}-{{$cicleModul['curs_id']}}">{{$cicleModul['nom']}}</option>
            @endforeach
        </select>
    
        <select name="add" id="add" class="btn btn-dark" onclick="changeAddRef()">
            <option value="cicle">Afegir cicle</option>
            <option value="modul">Afegir módul</option>
        </select>
        <a href="/cur/{{$curs_id}}/cicle/create" id="addButton" class="btn p-2 btn-info">+</a>
    </div>

    Hores:
    <table class="table">
        <thead>
            <tr>
                <th>Dll</th>
                <th>Dm</th>
                <th>Dc</th>
                <th>Dj</th>
                <th>Dv</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="number" class="form-control" /></td>
                <td><input type="number" class="form-control" /></td>
                <td><input type="number" class="form-control" /></td>
                <td><input type="number" class="form-control" /></td>
                <td><input type="number" class="form-control" /></td>
            </tr>
        </tbody>
    </table>

    Ufs:
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Dies</th>
                <th>Pujar</th>
                <th>Vaixar</th>
            </tr>
        </thead>
        <tbody id="tableUf">
            <tr>
                <td><input type="text" name="ufName" id="ufName" class="form-control" /></td>
                <td><input type="number" name="ufDays" id="ufDays" class="form-control" /></td>
                <td><button>↑</button></td>
                <td><button>↓</button></td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Crea calendari</button>
</form>

<script>
    const changeAddRef = () => {
        const addValue = document.getElementById('add')
        const cursId = document.getElementById('cicle-modul').value.split('-')[1]
        console.log(document.getElementById('cicle-modul').value)
        
        if (addValue === 'cicle') {
            document.getElementById('addButton').href = '/cur/' + cursId + '/cicle/create'
        } else {
            const cicleModul = document.getElementById('cicle-modul').value.split('-')[0]

            document.getElementById('addButton').href = '/cur/' + cursId + '/cicle/' + cicleModul + '/modul/create'
        }
    }
</script>
@endsection