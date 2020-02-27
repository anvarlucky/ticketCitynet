<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
{

	public function handle($request, Closure $next, $role)
	{
		if(!$request->user()->hasRole($role)){
			return redirect('/');
		}
		return $next($request); 
	}

}
