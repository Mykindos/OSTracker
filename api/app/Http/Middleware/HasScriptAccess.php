<?php

namespace App\Http\Middleware;

use App\Models\Script;
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

        $script = Script::where('name', '=', $request->scriptName)->first();

        if(!empty($script)){
            return response(['message' => 'Could not find a script with this name.']);
        }

        if(!$request->user()->hasScriptAccess($script['id'])){
            return response(['message' => 'You do not have access to this script.', 'status' => 401]);
        }

        $request->scriptID = $script['id'];

        return $next($request);
    }
}
