<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsNotDeveloper
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
        $devmode = $request->header('X-Enable-Devmode');
        if($devmode !== '1') {
           return redirect()->to('/notready');
        }
        return $next($request);
    }
}
