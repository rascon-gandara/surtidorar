<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'tproductoscategorias'; //Nombre de la tabla
    protected $primaryKey = 'cIdCategoria'; //Campo de la llave primaria
    public $timestamps  = false; //Desactiva registros de actualización/creación
}
