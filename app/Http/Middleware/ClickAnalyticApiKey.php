<?php

namespace App\Http\Middleware;

use \Illuminate\Http\Request;
use Closure;

class ClickAnalyticApiKey
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
        if ($request->has('api_key') && $request->api_key === ENV('API_KEY')) {
            return $next($request);
        }
        return response()->json('Sorry, you do not provide the key');
    }
}
