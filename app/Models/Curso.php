<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = ['curso','nombre'];
    public $timestamps = false;
    //Relacion con la tabla Asiganacion Docente 

 public function asignaciondocente()
     {
          return $this->hasMany('App\Models\Asignaciondocente');
     }   
   
}
