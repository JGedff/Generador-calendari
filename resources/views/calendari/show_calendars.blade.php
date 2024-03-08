@extends('..master')

@section('header')
<h2>Tots els calendaris</h2>
@endsection

@section('main')
<div>
    @foreach($calendaris as $calendar)
        <table class="table table-primary d-flex flex-wrap">
            <thead class="w-100">
                <tr class="d-flex justify-items-between">
                    <td class="w-25">Id</td>
                    <td class="w-25">Curs</td>
                    <td class="w-25">Cicle</td>
                    <td class="w-25">Modul</td>
                </tr>
            </thead>
            <tbody class="w-100">
                <tr class="d-flex justify-items-between">
                    <td class="w-25">{{$calendar->id}}</td>
                    <td class="w-25">{{$calendar->cur_id}}</td>
                    <td class="w-25">{{$calendar->cicle_id}}</td>
                    <td class="w-25">{{$calendar->modul_id}}</td>
                </tr>
            </tbody>
        </table>

        Díes:
        <table class="table table-primary d-flex flex-wrap">
            <thead class="w-100">
                <tr class="d-flex justify-items-between">
                    <td class="w-25">Dilluns</td>
                    <td class="w-25">Dimarts</td>
                    <td class="w-25">Dimecres</td>
                    <td class="w-25">Dijous</td>
                    <td class="w-25">Divendres</td>
                </tr>
            </thead>
            <tbody class="w-100">
                <tr class="d-flex justify-items-between">
                    <td class="w-25">{{$calendar->dl_days}}</td>
                    <td class="w-25">{{$calendar->dm_days}}</td>
                    <td class="w-25">{{$calendar->dc_days}}</td>
                    <td class="w-25">{{$calendar->dj_days}}</td>
                    <td class="w-25">{{$calendar->dv_days}}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
</div>

@endsection