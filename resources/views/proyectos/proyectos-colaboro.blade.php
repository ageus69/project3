@extends('mylayouts/app')
@section('contenido')
<div class="container">
    <h1>Proyectos donde colabora {{ Auth::user()->name }}</h1> 
    <a href="{{route('proyectos.create')}}"> Agregar proyecto</a>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>CATEGORÍA</td>
            <td>DESCRIPCIÓN</td>
            <td>USUARIOS</td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($proyectos as $p)
            @if(in_array(Auth::user()->id,$p->users->pluck('id')->toArray()))
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->categoria->name}}</td>
                    <td>{{$p->detalles}}</td>
                    <td>
                        @foreach ($p->users as $u)
                            {{$u->name}}<br>
                        @endforeach
                    </td>
                    <td><a href="proyectos/{{$p->id}}/edit">Editar</td>
                    <td>
                        <form action="{{route('proyectos.destroy', [$p])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>
@endsection