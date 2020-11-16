@extends('mylayouts/app')
@section('contenido')
<div class="container">
    
    <div class="page">
        <div class="page-single">
          <div class="container">
            <div class="row">
              <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                  <img src="./assets/brand/tabler.svg" class="h-6" alt="">
                </div>

                @if(isset($proyecto))
                  <h1 style="text-align: center">Cambiar proyecto</h1>
                  <form class="card" action="{{route('proyectos.update', [$proyecto])}}" method="post">
                  @method('patch')
                  <div class="card-body p-6">
                      <div class="form-group">
                        <label class="form-label">Renombra el proyecto</label>
                        <input name="name" type="text" class="form-control" placeholder="Escribe aquí" value="{{old('name') ?? $proyecto->name ?? ''}}">
                      </div>
                    <div class="form-group">
                        <label class="form-label">Detalles</label>
                        <textarea name="detalles" type="text" class="form-control" placeholder="Escribe los detalles">{{old('detalles') ?? $proyecto->detalles ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Categoria</label>
                        <select name="categoria_id" class="form-control">
                            @foreach ($categorias as $c)
                                <option value="{{$c->id}}" {{($c->id == $proyecto->categoria_id ? 'selected' : '')}}>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Usuarios</label>
                      <select name="user_id[]" class="form-control" multiple>
                          @foreach ($usuarios as $u)
                              <option value="{{$u->id}}" {{in_array($u->id,$proyecto->users->pluck('id')->toArray()) ? 'selected' : ''}} >{{$u->name}}</option>
                          @endforeach
                      </select>
                    </div>   

                @else
                  <h1 style="text-align: center">Agregar proyecto</h1>
                  <form class="card" action="{{route('proyectos.store')}}" method="post">
                    <div class="card-body p-6">
                      <div class="form-group">
                        <label class="form-label">Nombre del proyecto</label>
                        <input name="name" type="text" class="form-control" placeholder="Escribe aquí">
                    </div>
                  <div class="form-group">
                    <label class="form-label">Detalles</label>
                    <textarea name="detalles" type="text" class="form-control" placeholder="Escribe los detalles"></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Categoria</label>
                    <select name="categoria_id" class="form-control">
                      @foreach ($categorias as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Usuarios</label>
                    <select name="user_id[]" class="form-control" multiple>
                      @foreach ($usuarios as $u)
                        <option value="{{$u->id}}">{{$u->name}}</option>
                      @endforeach
                    </select>
                  </div>
                @endif
                @csrf
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection