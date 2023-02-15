@extends('layouts/layout')

@section('titulo', 'Nuevo mensaje')

@section('contenido')
    <h1>Nuevo mensaje</h1>

    <form method="POST" action="{{ route('messages.store') }}">
        @csrf
        <label for="subject">Sujeto</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
            
        <br>

        <label for="text">Mensaje</label>
        <textarea name="text" id="text" cols="30" rows="10">{{ old('text') }}</textarea>
        
        <br>

        <button type="submit">Crear evento</button>
    </form>

    @if($errors->any())
        Errores: <br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
@endsection

