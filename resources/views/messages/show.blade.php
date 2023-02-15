@extends('layouts/layout')

@section('titulo', 'Mensaje')

@section('contenido')
    <h1>{{ $message->subject }}</h1>
    <p>{{ $message->text }}</p>
    <p>Enviado por: {{ $message->name }}</p>
    <p>Fecha: {{ $message->created_at }}</p>
    <a href="{{ route('messages.create') }}">Volver</a>

@endsection
