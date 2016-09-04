<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'Paciente';
    protected $primaryKey="idPaciente";
    protected $fillable = ['Nombre','sexo','edad','Ocupacion','madre','padre','Colonia','Calle','num_ext'];
    public $timestamps = false;
}
