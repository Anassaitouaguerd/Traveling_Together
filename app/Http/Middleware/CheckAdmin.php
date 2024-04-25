<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = session("user_id");

        if (!$user_id) return abort(401);

        $user = User::where("id", $user_id)->first();

        if (!$user) return abort(401);

        if (!$user->role == 'admin') return abort(401);

        return $next($request);
    }
}