<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institucion extends Model
{
    protected $table = 'Institucion';
    protected $primaryKey="idInstitucion";
    protected $fillable = ['Nombre','Domicilio','telefono','nombreContacto'];
    public $timestamps = false;
}
