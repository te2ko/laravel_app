<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/todo';
    protected $maxAttempts = 2;     // ログイン試行回数（回）
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {//認証していたらリダイレクト　except()の引数にルーティング名を指定するとそのメソッドの処理は除いてくれる。
        $this->middleware('guest')->except('logout');
    }
    
    protected function loggedOut(Request $request)
    {//httpリクエストの内容は何？
        //dd($request);
        return redirect('/login');
    }
    
}
