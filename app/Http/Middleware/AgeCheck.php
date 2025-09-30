<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo("<pre>");
        // print_r($request);
        // echo "echo from AgeCheck Middleware";

        // url must be http://localhost:8000/?age=<number>
        // print_r($request->age);

        if($request->age < 18){
            die("You are not able to access this site");
        }
        return $next($request);
    }
}
