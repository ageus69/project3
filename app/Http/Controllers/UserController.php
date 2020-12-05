<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin');

        $users = User::all();
        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::all();
        return view('users/agregar', compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::create($request->all());
        $user->proyectos()->attach($request->proyecto_id);
        
        
        //redireccionar
        return redirect('users')->with([
            'mensaje' => 'usuario creado con exito',
            'alert-type' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //Los muestro en index
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('admin');

        $proyectos = Proyecto::all();
        return view('users/editar', compact('proyectos', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //validar
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::where('id', $user->id)->update($request->except('_method','_token','proyecto_id'));

        $user->proyectos()->sync($request->proyecto_id);

        return redirect('users')->with([
            'mensaje' => 'usuario editado con exito',
            'alert-type' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('admin');

        $user->delete();
        return redirect('users')->with([
            'mensaje' => 'usuario eliminado con exito',
            'alert-type' => 'alert-success'
        ]);
    }
}
