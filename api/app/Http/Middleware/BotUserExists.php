<?php

namespace App\Http\Middleware;

use App\Models\BotUser;
use Closure;

class BotUserExists
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
        BotUser::firstOrCreate(['username' => $request->user]);

        return $next($request);
    }
}
