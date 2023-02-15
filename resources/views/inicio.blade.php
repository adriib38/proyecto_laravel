@extends('layouts/layout')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>AAAM</h1>
    <p>Somos una asociación de amantes a los mangos. Nos gusta comerlos, verlos, olerlos, tocarlos, y sobre todo, comerlos.</p>

    <p>Si eres como nosotros, ¡bienvenido! <a href="{{ route('register') }}">Regístrate</a> y empieza a disfrutar de nuestra comunidad.</p>

    <p>Puedes ver un video resumen de todos nuestros eventos de 2022 <a href="https://bit.ly/3S00DJs" target="_blank">aquí</a></p>

    @auth
        <p>Estás logueado.</p>
        <p>Nombre: {{ Auth::user()->name }}</p>
    @else
        <p>No estás logueado.</p>
    @endauth
@endsection
