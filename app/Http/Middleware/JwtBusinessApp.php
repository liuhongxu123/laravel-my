<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/7
 * Time: 15:07
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class JwtBusinessApp
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        config(['jwt.user' => '\App\V1\Business']);
        config(['auth.providers.users.model' => \App\V1\Business::class]);
        return $next($request);
    }
}