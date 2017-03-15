<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        $domain = ["'".env('APP_URL')."'"];
//        $next = $next;
        if(isset($request->server()['HTTP_ORIGIN'])){
            $origin = $request->server()['HTTP_ORIGIN'];
            if(in_array($origin,$domain)){
                header('Acces-Controll-Allow-Origin: ' . $domain);
                header('Acces-Controll-Allow-Headers: Origin, Content_Type, Authorization');
            }
        }

        return $next($request);
    }
}
