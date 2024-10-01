<?php
// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role_id != 1) {
            return redirect('home');
        }
        return $next($request);
    }
}