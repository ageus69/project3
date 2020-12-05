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

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <h1 style="text-align: center">Cambiar usuario</h1>

                        <form class="card" action="{{route('users.update', [$user])}}" method="post">
                            @method('patch')

                        <div class="card-body p-6">
                            <div class="form-group">
                                <label class="form-label">Renombra el usuario</label>
                                <input name="name" type="text" class="form-control" placeholder="Escribe aquí" value="{{old('name') ?? $user->name ?? ''}}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Cambia el email</label>
                                <input name="email" type="text" class="form-control" placeholder="Escribe aquí" value="{{old('email') ?? $user->email ?? ''}}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Proyectos</label>
                                <select name="proyecto_id[]" class="form-control" multiple>
                                    @foreach ($proyectos as $p)
                                        <option value="{{$p->id}}" {{in_array($p->id,$user->proyectos->pluck('id')->toArray()) ? 'selected' : ''}} >{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>   
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