<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultasController extends Controller
{
    function viewProducto(){
        $productos = Producto::all();
        return view('catalogo')->with('productos', $productos);
    }
    function detalles(Request $r){
        $id = $r->input('id');
        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('productos.id_producto','=',$id)
            ->get();
        return view('jorgeViews.detallesProducto')->with('producto',$producto);
    }
    function carrito(Request $r){
        $id = $r->input('id');
        $talla = $r->get('tallas');
        $cantidad = $r->input('cantidad');
//        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
//            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
//            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
//            ->where('productos.id_producto','=',$id)
//            ->get();
        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
           ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito')
           ->select(DB::raw("id_carrito.carritos as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
           ->where('productos.id_producto','=',4)
           ->get();


        $carrito = new Carrito();
        $carrito->producto_carrito()->id_carrito = '4';
        $carrito->producto_carrito()->id_producto = $id;
        $carrito->producto_carrito()->cantidad = dd($carrito->producto_carrito()->sum("carrito_has_productos.cantidad as 'cantidad'")->where('id_carrito','=',$id)->get());

        return view('jorgeViews.carrito')->with('producto', $producto)->with('cantidad', $cantidad)->with('talla', $talla);
    }


}
