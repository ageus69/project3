@if(session()->has('mensaje'))
<div class="alert {{session('alert-type', 'alert-info')}}" role="alert">
        {{session('mensaje')}}
    </div>
@endif