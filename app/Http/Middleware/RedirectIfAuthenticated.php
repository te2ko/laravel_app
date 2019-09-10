<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {//登録するユーザーを認証する　check()は認証していたらtureを返す
        //dd($request);
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
//ミドルウェアを通過しアプリケーションの先へリクエストを通す
        return $next($request);
    }
}
