<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Alert;

class MDusuarioadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $a=Session::get('tipo');

         if( $a=='1' || $a=='2')
        {
            return $next($request);
         
               }  
     
        else { 
                Alert::error('No tienes suficientes permisos ');
      return redirect('/');
         
       
        }  
     
             
    }
}
