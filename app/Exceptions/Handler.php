<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;

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
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = Arr::get($exception->guards(), 0);
        switch ($guard) {
            case 'client':
                return $request->expectsJson()
                    ? response()->json(['message' => $exception->getMessage()], 401)
                    : redirect()->guest($exception->redirectTo() ?? route('client.login_page'));
                break;
            default:
                return $request->expectsJson()
                            ? response()->json(['message' => $exception->getMessage()], 401)
                            : redirect()->guest($exception->redirectTo() ?? route('login'));
                break;
        }
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
