<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AutoDeploy
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Hash::make(request()->header('authorization'));
        $authToken = config('mine.auto_deploy_token');

        if (!$token || !Hash::check($authToken, $token)) {
            return response()->json([
                'status' => false,
                'message' => 'Unathorized Acess',
            ], 403);
        }

        return $next($request);
    }
}
