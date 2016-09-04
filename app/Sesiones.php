<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
    protected $table = 'Sesiones';
    protected $primaryKey="Id";
    protected $fillable = ['id_pas','Nombre','Fecha','Observaciones'];
    public $timestamps = false;
}
