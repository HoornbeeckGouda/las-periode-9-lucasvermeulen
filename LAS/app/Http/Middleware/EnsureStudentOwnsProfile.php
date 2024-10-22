<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureStudentOwnsProfile
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the currently logged-in user
        $user = Auth::user();
        // Compare the requested ID with the logged-in user's ID
        if ($user && $user->id == $request->route('student')->id) {
            // If they match, allow the request to proceed
            return $next($request);
        }

        // If not, abort with a 403 Forbidden response
        abort(403, 'Unauthorized access to another student\'s profile');
    }
}
