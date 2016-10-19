<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Salesmen
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
      if (Auth::User()->isSalesman()){
          return $next($request);
        }
      else{
         return redirect('/404');
    }
}
}
