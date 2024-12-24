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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role == 'Admin') {
            return $next($request);
        }

        // abort(401);

        \Auth::logout(); // Log out the user
        return redirect('/')->with('alert', [
            'title' => 'Akses Ditolak',
            'text' => 'Anda tidak bisa mengakses halaman ini.',
            'icon' => 'error'
        ]);
    }
}
