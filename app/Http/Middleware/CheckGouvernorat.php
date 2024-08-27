<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Gouvernorat;


class CheckGouvernorat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next ,$gouvernorat)
    {
        if (auth()->user()->id_gouvernorat == $gouvernorat) {
            return $next($request);
        }
        return redirect('/');
    }
   /* public function handle(Request $request, Closure $next ,$gouvernorat)
    {
        $id_gouvernorat = Gouvernorat::where('nom_gouvernorat_fr', '=', $gouvernorat)
        ->pluck('id');
        $user_gouvernorat=$request->user()->id_gouvernorat;
        if($user_gouvernorat = $id_gouvernorat)
        {
            return $next($request);
        }
        return "page not found";
    }*/
}
