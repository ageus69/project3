<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = "proyectos";
    protected $fillable = ['name', 'categoria_id', 'detalles'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
