<?php

namespace App\Exceptions;

use App\lib\Code;
use App\lib\JSON;
use Dingo\Api\Contract\Debug\MessageBagErrors;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->server->get('API_PREFIX')) {

            $statusCode = $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : 500;

            if (! $message = $exception->getMessage()) {
                $message = sprintf('%s', Response::$statusTexts[$statusCode]);
            }

            if ($exception instanceof MessageBagErrors && $exception->hasErrors()) {
                $statusCode = 200;
                $message = $exception->getErrors()->first();
            }

            return JSON::jsonFormat($statusCode, $message, [], $statusCode);

        }

        return parent::render($request, $exception);
    }
}
