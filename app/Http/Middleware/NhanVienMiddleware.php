<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NhanVienMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $user = Auth::guard('sanctum')->user();
    if (!$user) {
        return response()->json([
            'message' => "Chưa xác thực - user null",
        ]);
    }

    if ($user instanceof \App\Models\NhanVien) {
        return $next($request);
    } else {
        return response()->json([
            'message' => "Sai kiểu user: " . get_class($user),
        ]);
    }
}
}

