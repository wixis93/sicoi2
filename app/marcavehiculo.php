<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marcavehiculo extends Model
{
    protected $table="Marca_vehiculo";
    protected $primaryKey="id";
    protected $fillable=['Codigo','nombre_marca'];
}
