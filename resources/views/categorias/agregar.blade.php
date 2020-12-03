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

                @if(isset($categoria))
                    <h1 style="text-align: center">Cambiar categoría</h1>
                    <form class="card" action="{{route('categorias.update', [$categoria])}}" method="post">
                    @method('patch')
                    <div class="card-body p-6">
                        <div class="form-group">
                            <label class="form-label">Renombra la categoría</label>
                @else
                    <h1 style="text-align: center">Agregar categoría</h1>
                    <form class="card" action="{{route('categorias.store')}}" method="post">
                        <div class="card-body p-6">
                            <div class="form-group">
                                <label class="form-label">Nombre de la categoría</label>
                @endif
                @csrf
                      <input name="name" type="text" class="form-control" placeholder="Escribe aquí">
                    </div>
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