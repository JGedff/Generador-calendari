@extends('..master')

@section('header')
<h2>Introdueix les dades del calendari</h2>
@endsection

@section('main')
<form method="POST" class="p-4" action="/calendari">
    @csrf

    <div>
        <select name="curs" id="curs" onclick="changeCurs()">
            @foreach($curs as $cur)
                <option value="{{$cur->id}}">{{$cur->nom}}</option>
            @endforeach
        </select>
        <a class="btn btn-info" href="/cur/create" id="addCurs">Afegir curs</a>
    </div>
    
    <div>
        <select name="cicle_modul" id="cicle_modul" onclick="changeModul()">
            @foreach($cicleModuls as $cicleModul)
                <option value="{{$cicleModul['cicle_id']}}-{{$cicleModul['curs_id']}}-{{$cicleModul['modul_id']}}">{{$cicleModul['nom']}}</option>
            @endforeach
        </select>
    
        <a id="addCicle" class="btn btn-success" href="/cur/{{$curs_id}}/cicle/create">Afegir cicle</a>
        <a id="addModul" class="btn btn-success" href="/cur/{{$curs_id}}/cicle/1/modul/create">Afegir módul</a>
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
                <td><input type="number" min="0" value="0" name="dl_days" id="dl_days" class="form-control" /></td>
                <td><input type="number" min="0" value="0" name="dm_days" id="dm_days"class="form-control" /></td>
                <td><input type="number" min="0" value="0" name="dc_days" id="dc_days"class="form-control" /></td>
                <td><input type="number" min="0" value="0" name="dj_days" id="dj_days"class="form-control" /></td>
                <td><input type="number" min="0" value="0" name="dv_days" id="dv_days"class="form-control" /></td>
            </tr>
        </tbody>
    </table>

    Ufs:
    <table class="table">
        <thead>
            <tr>
                <th>Mou arrossegant</th>
                <th>Nom</th>
                <th>Dies</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody id="tableUf">
            @forelse ($modulUfs as $key => $uf)
                @if ($uf['modul_id'] === 1)
                    <tr id="tr{{$key + 1}}">
                        <td><span class="ui-icon ui-icon-arrow-2n-s">↑ ↓</span></td>
                        <td><input type="text" name="ufName{{$key + 1}}" value="{{$uf['nomUf']}}" id="ufName{{$key + 1}}" class="form-control" /></td>
                        <td><input type="number" name="ufDays{{$key + 1}}" min="0" value="{{$uf['dies']}}" id="ufDays{{$key + 1}}" class="form-control" /></td>
                        <td><button type="button" onclick="delUfField('{{$key + 1}}')">Eliminar</button></td>
                    </tr>
                @endif
            @empty
                <tr id="tr1">
                    <td><span class="ui-icon ui-icon-arrow-2n-s">↑ ↓</span></td>
                    <td><input type="text" value="UF1" name="ufName1" id="ufName1" class="form-control" /></td>
                    <td><input type="number" name="ufDays1" min="0" value="0" id="ufDays1" class="form-control" /></td>
                    <td><button type="button" onclick="delUfField('1')">Eliminar</button></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <button onclick="addUfField()" type="button">Afegir UF</button>
    <button type="submit">Crea calendari</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#tableUf").sortable({
            update: function (event, ui) {
                var order = $(this).sortable('toArray').toString();
                $.ajax({
                    type: "POST",
                    data: {order: order, _token: '{{ csrf_token() }}'},
                    success: function (response) {
                        // Puedes mostrar algún mensaje si lo deseas
                        console.log(response);
                    }
                });
            }
        });
    });

    const UFS = <?php echo json_encode($modulUfs); ?>;
    const phpUfCount = <?php echo $ufsFirstModule; ?>;
    let UfCount = phpUfCount + 1
    let cursId = 1
    let cicleModul = 1

    function changeCurs() {
        cursId = document.getElementById('curs').value
        document.getElementById('addCicle').href = '/cur/' + cursId + '/cicle/create'
        changeModul()
    }

    function addUfField() {
        document.getElementById('tableUf').innerHTML += `<tr id="tr${UfCount}">
            <td><span class="ui-icon ui-icon-arrow-2n-s">↑ ↓</span></td>
            <td><input type="text" value="UF${UfCount}" name="ufName${UfCount}" id="ufName${UfCount}" class="form-control" /></td>
            <td><input type="number" name="ufDays${UfCount}" min="0" value="0" id="ufDays${UfCount}" class="form-control" /></td>
            <td><button type="button" onclick="delUfField(${UfCount})">Eliminar</button></td>
        </tr>`
            
        UfCount++
    }
        
    function delUfField(id) {
        document.getElementById('tableUf').removeChild(document.getElementById('tr'+id));
    }
    
    function changeModul() {
        cicleModul = document.getElementById('cicle_modul').value.split('-')[0]

        document.getElementById('addModul').href = '/cur/' + cursId + '/cicle/' + cicleModul + '/modul/create'
        document.getElementById('tableUf').innerHTML = ''

        addExistentsUf()
    }

    function addExistentsUf() {
        UfCount = 1

        UFS.forEach(uf => {
            if (uf.modul_id == cicleModul) {
                document.getElementById('tableUf').innerHTML += `<tr id="tr${UfCount}">
                    <td><span class="ui-icon ui-icon-arrow-2n-s">↑ ↓</span></td>
                    <td><input type="text" name="ufName${UfCount}" value="${uf.nomUf}" id="ufName${UfCount}" class="form-control" /></td>
                    <td><input type="number" name="ufDays${UfCount}" min="0" value="${uf.dies}" id="ufDays${UfCount}" class="form-control" /></td>
                    <td><button type="button" onclick="delUfField(${UfCount})">Eliminar</button></td>
                </tr>`
    
                UfCount++
            }
        });
    }
</script>
@endsection