<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavelaController extends Controller
{
    function registrardisenos(){
        return view('FavelaViews.diseno');
    }
    function verdisenos(){
//        $imagen=storage_path().'/disenos/disenos_clientes/c08c1AlpineLarches_ROW11646276761_1366x768.jpg';
//        dd($imagen);
        $imagen2=public_path().'/images/5c06151ae3d8d.jpg';
//        return view ('index',compact('imagen2'));
        dd($imagen2);
    }
    function ingresardiseno(Request $request){
        $archivo=$request->file('file');
        $ruta=storage_path().'/disenos/disenos_clientes';
        $nombrearchivo=substr(uniqid(),1,5).$archivo->getClientOriginalName();

        $archivo->move($ruta,$nombrearchivo);
        dd($request->input('algo'));
    }
}
//identificar qué tipo de usuario es y guardar el diseño en distintas carpetas