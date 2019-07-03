<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use App\Productos;

class HomeController extends Controller
{
    public function home(){
        return view('template.master');
    }

    public function obtenerCategorias(){
        $lista_categorias = Categorias::all();

        return response()->json($lista_categorias);
    }

    public function obtenerProductosCategoria(Request $request){
        $data_busqueda = $request->all();
        $id_categoria = $data_busqueda['cIdCategoria'];
        $lista_productosCategoria = Productos::where('cCategoriaProducto', $id_categoria)->get();

        return response()->json($lista_productosCategoria);
    }
}
