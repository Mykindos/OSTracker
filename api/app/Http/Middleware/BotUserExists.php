<?php

namespace App\Http\Middleware;

use App\BotUser;
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
        $botUser = BotUser::where('username', '=', $request->user)->first();

        if(empty($botUser)){
            return response(["message" => "Could not find a user by this name"]);
        }

        return $next($request);
    }
}
