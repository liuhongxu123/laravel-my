<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/31
 * Time: 10:29
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Closure;


class JwtAuthAndRefresh extends BaseMiddleware {

    public function handle(Request $request, Closure $next){
        $this->checkForToken($request);
        try {
            if (! $this->auth->parseToken()->authenticate()) {
                throw new UnauthorizedHttpException('jwt-auth', 'User not found');
            }
            return $next($request);
        }catch (TokenExpiredException $e) {
            try {
                $token = $this->auth->parseToken()->refresh();
                //保证该次请求成功
                Auth::guard('api')->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            } catch (JWTException $e) {
                throw new UnauthorizedHttpException('jwt-auth', $e->getMessage(), $e, $e->getCode());
            }
            return $this->setAuthenticationHeader($next($request), $token); //将刷新后的token置于响应头返回客户端
        }catch (JWTException $e) {
            throw new UnauthorizedHttpException('jwt-auth', $e->getMessage(), $e, $e->getCode());
        }
    }
}