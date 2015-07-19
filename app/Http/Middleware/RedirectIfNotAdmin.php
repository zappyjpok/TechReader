<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if(!$request->user()->hasRole('Admin'))
        {
            if($request->user()->hasRole('Staff'))
            {
                return redirect('/home');
            } else {
                return redirect('/');
            }

        }

        return $next($request);
	}

}
