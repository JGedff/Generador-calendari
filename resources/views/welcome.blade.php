@extends('master')

@section('header')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
        <div class="py-2">
            <a href="{{ url('/dashboard') }}" class="m-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent text-black">Panell</a>
        </div>
        @else
            <div class="py-2">
                <h3>Inicia sessió per crear el teu calendari</h3>
            </div>
            <div class="py-2">
                <a href="{{ route('login') }}" class="m-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent text-black">Log in</a>
                
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="m-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent text-black">Register</a>
                @endif
            </div>
        @endauth
    </div>
    @endif
</div>
@endsection

@section('main')
<h1 class="m-2">Creador de calendaris</h1>
<h3 class="m-2">Benvingut</h3>
@if(Auth::user())
    @if(Auth::user()->admin == 1)
        <a href="/calendari/create" class="btn btn-info m-2">Crear un calendari</a>
        <a href="/cur" class="btn btn-info m-2">Veure tots els cursos</a>
        <a href="/calendari/export" class="btn btn-info m-2">Descarregar calendari</a>
    @else
        <p class="m-2">Estàs loguejat</p>
        <a href="/calendari/export" class="btn btn-info m-2">Descarregar calendari</a>
    @endif
@else

@endif

@endsection
