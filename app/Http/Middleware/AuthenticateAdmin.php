<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class AuthenticateAdmin
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
        if ($user = Sentinel::check()) {
            if ($user->hasAccess(['user.admin'])) {
                return $next($request);
            }
        }

        session()->flash('info', 'You have to login first');
        return redirect()->guest(route('home'));

    }
}
