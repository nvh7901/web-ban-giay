<?php

namespace App\Http\Middleware;

use Closure;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            return redirect()->guest('/login');
        }

        if (Auth::user()->level != Constant::user_level_user) {
            Auth::logout();
            return redirect()->guest('/login');
        }
        return $next($request);
    }
}
