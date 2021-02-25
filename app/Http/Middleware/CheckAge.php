<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        if (!$request->session()->has('user_name')) {
//            dd($request->server());
            return redirect('admin/login')->with('tip','请先登录哦！');
        }
        return $next($request);
    }
}
