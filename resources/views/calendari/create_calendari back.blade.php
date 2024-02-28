@extends('..master')

@section('main')
<h2 class="textMargin m-2">Introdueix les dades al formulari per crear el teu calendari</h2>
<form action="/calendari" class="m-2" method="POST">
    @csrf
    <table>
        <tr>
            <td><label>Calendari: </label>
                <input type="text" class="form-control m-2" name="calendari_nom" id="calendari_nom" required></td>
        </tr>
        <tr>
            <td><label>Curs: </label>
                <input type="text" class="form-control m-2" name="cur_nom" id="cur_nom" aria-describedby="cursAnys" required></td>
        </tr>
        <tr>
            <td><label>Data d'inici: </label>
                <input type="date" class="form-control m-2" name="cur_data_inici" id="cur_data_inici" aria-describedby="iniciCurs" required></td>
        </tr>
        <tr>
            <td><label>Data Finalització: </label>
                <input type="date" class="form-control m-2" name="cur_data_final" id="cur_data_final" aria-describedby="finalCurs" required></td>
        </tr>
        <tr><td><label>Trimestre</label>
                    <input type="text" class="form-control m-2" name="trimestre_nom" id="trimestre_nom" aria-describedby="trimestreAnys" required></td>
        </tr>
        <tr>
            <td><label>Data inici Trimestre: </label>
                <input type="date" class="form-control m-2" name="trimestre_data_inici" id="trimestre_data_inici" aria-describedby="trimestre" required></td>
        </tr>

        <tr>
            <td><label>Data finalització Trimestre: </label>
                <input type="date" class="form-control m-2" name="trimestre_data_final" id="trimestre_data_final" aria-describedby="trimestre" required></td>
        </tr>

        <tr>
            <td><label >Festiu</label>
                <input type="text" class="form-control m-2" name="festiu_nom" id="festiu_nom" aria-describedby="festiuAnys" required></td>
        </tr>
        <tr>
            <td><label>Data inici Festiu: </label>
                <input type="date" class="form-control m-2" name="festiu_data_inici" id="festiu_data_inici" aria-describedby="festiu_data_inici" required></td>
        </tr>
        <tr>
            <td><label>Data finalització Festiu: </label>
                <input type="date" class="form-control m-2" name="festiu_data_final" id="festiu_data_final" aria-describedby="festiu_data_final" required></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success mt-2">Enviar</button>
</form> 
@endsection