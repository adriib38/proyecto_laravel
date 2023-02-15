@extends('layouts/layout')

@section('titulo', 'Editar cuenta')

@section('contenido')
    <h1>Editar cuenta</h1>
    <h3> {{$member->name}} </h3>
    
    <form action="{{route('members.update', $member->id)}}" method="post">
        @csrf

        @method('put')

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="birthday">Fecha de nacimiento</label>
        <input type="date" name="birthday" id="birthday" value="{{$member->birthday}}">
        <br>

        <label for="twitter">Twitter</label>
        <input type="text" name="twitter" id="twitter" value="{{$member->twitter}}">
        <br>

        <label for="instagram">Instagram</label>
        <input type="text" name="instagram" id="instagram" value="{{$member->instagram}}">
        <br>

        <label for="twitch">Twitch</label>
        <input type="text" name="twitch" id="twitch" value="{{$member->twitch}}">
        <br>

        <input class="bg-geen" type="submit" value="Guardar">
    </form>


    @if($errors->any())
        Hay errores en el formulario: <br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection
