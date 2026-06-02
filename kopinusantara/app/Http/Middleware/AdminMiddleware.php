<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user->full_name !== 'admin') {
            return response()->json([
                'status' => 'error',
                'message' => 'Admin only for this request'
            ], 403);
        }

        return $next($request);
    }
}
