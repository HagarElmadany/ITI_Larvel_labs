<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminsOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $adminOnlyLogic = true; //this is just a placeholder for the logic that checks if the user is an admin or not
        if($adminOnlyLogic) {
            return $next($request);  //continue to the next middleware
        } else {
            throw new \Exception('this route is for admins only');
        }
    }
}
