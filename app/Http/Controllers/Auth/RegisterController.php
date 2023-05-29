<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// RegisterFormRequest使用
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // ユーザー新規登録処理。=postの処理。
    public function register(RegisterFormRequest $request)
    {
        if ($request->isMethod('post')) {

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            // セッションを使用してユーザー名表示させる。
            $data = $request->only('username');
            $this->create($data);
            return redirect('added')->with('username', $request);
        }
    }

    // 新規登録用viewページ表示。=getの処理
    public function registerView(Request $request)
    {
        return view('auth.register');
    }
    // 登録完了用viewページ表示。=getの処理。
    public function added()
    {
        return view('auth.added');
    }
}
