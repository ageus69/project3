<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categorias";
    protected $fillable = ['name'];
    
    //accessor
    public function getNameAttribute($value){
        return ucfirst(strtoupper($value));
    }

    //mutator
    public function setNameAttribute($value){
        $this->attributes['name'] = mb_strtoupper($value, 'UTF-8');
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class);
    }
}
