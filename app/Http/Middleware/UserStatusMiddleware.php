<?php

namespace App\Http\Middleware;

use App\Http\Responses\ErrorResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserStatusMiddleware
{
    /**
     * Handle user status an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!$request->user()->active()) {
            Log::info(__('auth.not_active'));
            return new ErrorResponse(__('auth.not_active'), [], 400);
        }
        return $next($request);
    }
}
