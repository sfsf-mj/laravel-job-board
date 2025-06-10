<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()) {
            if(auth()->user()->email == 'mj@example.com') {
                return $next($request);
            }
            return redirect('/')->with('notification', [
                'type' => 'info',
                'message' => 'You do not have permission to access this page.',
            ]);
        }
        return redirect('/login')->with('notification', [
            'type'=> 'info',
            'message' => 'Please log in to access this page.',
        ]);
    }
}
