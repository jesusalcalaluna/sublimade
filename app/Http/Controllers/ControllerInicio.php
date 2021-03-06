<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//--------Modelos
use App\Carrito;
use App\Categoria;
use App\Cliente;
use App\Detalle_pedido;
use App\Diseno;
use App\Diseno_cliente;
use App\Empleado;
use App\Entrada;
use App\Inventario;
use App\Material;
use App\Pedido;
use App\Persona;
use App\Producto;
use App\Proveedor;
use App\Proveedor_material;
use App\Salida;
use App\Tipos_producto;
use App\User;
use App\Usuario;
//------------------

class ControllerInicio extends Controller
{
    function twitter(){
        return redirect('http://www.twitter.com');
    }
    function instagram(){
        return redirect('http://www.instagram.com');
    }
    function facebook(){
        return redirect('http://www.facebook.com');
    }
    function whatsapp(){
        return redirect('http://web.whatsapp.com');
    }
}
