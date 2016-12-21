<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Sentinel::check()) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            session()->flash('info', 'You have to login first');
            return redirect()->guest(route('home'));
        }

        return $next($request);
    }
}
