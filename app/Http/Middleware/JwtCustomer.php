<?php

namespace App\Http\Middleware;

use Closure;

class JwtCustomer
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
        config(['jwt.user' => '\App\V1\Customer']);
        config(['auth.providers.users.model' => \App\V1\Customer::class]);
        return $next($request);
    }
}
