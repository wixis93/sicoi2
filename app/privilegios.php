<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilegios extends Model
{
    //
    protected $table='Privilegios';
    protected $primarykey='idPrivilegios';
    protected $fillable=['Tipo_privilegio'];
}
