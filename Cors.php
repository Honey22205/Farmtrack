<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow all origins (Change '*' to your domain in production)
        $response = $next($request)
            ->header('Access-Control-Allow-Origin', '*') // Adjust '*' for specific origins in production
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        // Handle preflight requests
        if ($request->isMethod('OPTIONS')) {
            return response()->json([], 200); // Return a 200 response for preflight requests
        }

        return $response;
    }
}
