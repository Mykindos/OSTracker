<?php

namespace App\Http\Middleware;

use Closure;

class HasScriptAccess
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

        if(!$request->user()->hasScriptAccess($request->scriptID)){
            return response(['message' => 'You do not have access to this script.', 'status' => 401]);
        }

        return $next($request);
    }
}
