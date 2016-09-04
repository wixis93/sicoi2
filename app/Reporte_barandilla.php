<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte_barandilla extends Model
{
    protected $table = 'Reporte_barandilla';
    protected $primaryKey="idReporte_barandilla";
    protected $fillable = ['id_asegurado','fecha_ingreso','fecha_salida','motivo_arresto','observaciones','pertenencias','unidad','lugar','destino', 'aseguramiento'];
    public $timestamps = false;
}
