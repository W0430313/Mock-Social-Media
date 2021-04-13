<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
            foreach(\Illuminate\Support\Facades\Auth::user()->roles as $role)
            {
                if ($role->name == "User Administrator") {
                    return $next($request);
                }
            }

            $request->session()->flash('status','You do not have proper permissions to view this page');
            return back();


    }
}
