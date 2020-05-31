<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Auth;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/login/admin');
        }
        if ($request->is('customer') || $request->is('customer/*')) {
            return redirect()->guest('/login/customer');
        }
        return redirect()->guest('/login/customer');
    }
}
