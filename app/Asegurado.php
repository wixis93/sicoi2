<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asegurado extends Model
{
    protected $table = 'Asegurado';
    protected $primaryKey="idAsegurado";
    protected $fillable = ['Nombre','Ap_paterno','Ap_materno','Fechanacimiento','Alias','domicilio','foto'];
    public $timestamps = false;
}
