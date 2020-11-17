@extends('mylayouts/app')
@section('contenido')
<div class="container">
    <h1>Usuarios</h1>
    <a href="{{route('users.create')}}"> Agregar usuario</a>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>EMAIL</td>
            <td>PROYECTOS</td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($users as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>
                    @foreach ($u->proyectos as $p)
                        {{$p->name}}<br>
                    @endforeach
                </td>
                <td><a href="users/{{$u->id}}/edit">Editar</td>
                <td>
                    <form action="{{route('users.destroy', [$u])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection