<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->level=='admin'){
            return redirect()->back();
        }
        return $next($request);
    }
}
