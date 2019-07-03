<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'tProductos'; //Nombre de la tabla
    protected $primaryKey = 'cIdProducto'; //Campo de la llave primaria
    public $timestamps  = false; //Desactiva registros de actualización/creación
   
}
