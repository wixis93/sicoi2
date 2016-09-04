<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emergencia extends Model
{
    protected $table="Emergencia";
    protected $primaryKey="id";
    protected $fillable=['Nombre'];
}
