<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaciondocente extends Model
{
    use HasFactory;
    protected $fillable = ['ano_lectivo']; 
    public $timestamps = false;


 //Relacion con la tabla Asignaturas
 public function asignaturas()
 {
            return $this->belongsTo('App\Models\Asignatura');
 }


    //Relacion con la tabla Cursos
    public function cursos()
        {
                   return $this->belongsTo('App\Models\Curso');
        }


    //Relacion con la tabla Cursos
    public function personas()
        {
                   return $this->belongsTo('App\Models\Persona');
        }


   


}