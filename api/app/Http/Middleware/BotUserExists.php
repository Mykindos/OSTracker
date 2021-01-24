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
        $user = BotUser::firstOrCreate(['username' => $request->user]);

        $request->botUserID = $user['id'];
        return $next($request);
    }
}
