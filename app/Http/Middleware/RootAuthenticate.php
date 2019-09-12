<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RootAuthenticate
{
    public function handle($request, Closure $next, $guard = NULL)
    {
        $auth = Auth::guard($guard);

        if ($auth->guest()) {
            return redirect()->guest('login');
        }

        if (!$auth->user()->isRoot()) {
            return response('Access denied.', 401);
        }

        return $next($request);
    }
}
