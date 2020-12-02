<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use HasFactory;
    use SoftDeletes; //Borrado logico

    protected $table = "proyectos";
    protected $fillable = ['name', 'categoria_id', 'detalles'];
    protected $attributes = ['user_id' => null];

    //accessor
    public function getNameAttribute($value){
        return ucfirst(strtoupper($value));
    }
    //accessor
    public function getDetallesAttribute($value){
        return ucfirst(strtoupper($value));
    }

    //mutator
    public function setDetallesAttribute($value){
        $this->attributes['detalles'] = mb_strtoupper($value, 'UTF-8');
    }
    //mutator
    public function setNameAttribute($value){
        $this->attributes['name'] = mb_strtoupper($value, 'UTF-8');
    }

    //obtendremos el usuario owner
    public function user_owner(){
        return $this->belongsTo(User::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
