<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos/index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('proyectos/agregar', compact('categorias'), compact('usuarios'));
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
            'categoria_id' => 'required',
            'detalles' => 'required'
        ]);

        $proyecto = Proyecto::create($request->all());
        $proyecto->users()->attach($request->user_id);
        
        
        //redireccionar
        return redirect('proyectos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //Muestro en index lol
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('proyectos/agregar', compact('proyecto','categorias','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //validar
        $request->validate([
            'name' => 'required',
            'categoria_id' => 'required',
            'detalles' => 'required'
        ]);

        Proyecto::where('id', $proyecto->id)->update($request->except('_method','_token','user_id'));

        $proyecto->users()->sync($request->user_id);

        return redirect('proyectos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect('proyectos');
    }
}
