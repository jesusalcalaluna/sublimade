<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultasController extends Controller
{
    function viewProducto(){
        $productos = Producto::all();
        return view('productos')->with('productos', $productos);
    }
    function detalles(Request $r){
        $id = $r->input('id');
        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria'"))
            ->where('productos.id_producto','=',$id)
            ->get();
        return view('detallesProducto')->with('producto',$producto);
    }
    function carrito(){
        return view('carrito');
    }


}
