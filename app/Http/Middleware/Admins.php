<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Auth;
class Admins
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
      if (Auth::User()->isAdmin()){
        return $next($request);
      }
      else{
        /*return ver en resources/views/errors/404.blade.php*/
          return redirect('/404');
      }
    }
}
