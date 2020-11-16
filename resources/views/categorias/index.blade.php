@extends('mylayouts/app')
@section('contenido')
<div class="container">
    <h1>Categorías</h1>
    <a href="{{route('categorias.create')}}"> Agregar categoria</a>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($categorias as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td><a href="categorias/{{$c->id}}/edit">Editar</td>
                <td>
                    <form action="{{route('categorias.destroy', [$c])}}" method="POST">
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