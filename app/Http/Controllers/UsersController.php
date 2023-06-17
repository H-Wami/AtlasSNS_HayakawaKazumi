<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    //登録ユーザー表示
    public function search()
    {
        $id = Auth::id(); //Auth認証している=ログイン中のユーザー
        $users = User::where('id', '!=', $id)->get(); //Auth認証されたユーザー以外を表示する
        $follows = Auth::User()->follows()->get(); //ログインユーザーがフォローしている人を表示する
        return view('users.search', ['users' => $users, 'follows' => $follows]);
    }

    //ユーザー検索機能
    public function searchUser(Request $request)
    {
        $keyword = $request->input('keyword'); //入力されたkeywordを$keywordにする
        if (!empty($keyword)) { //もし$keywordが入力されたら
            $id = Auth::id(); //Auth認証している=ログイン中のユーザー
            $users = User::where('username', 'like', '%' . $keyword . '%')
                ->where('id', '!=', $id)->latest()->get(); //usernameカラムであいまい検索して最新順で表示する(ログインユーザー以外)
        } else { //$keywordが入力されず検索されたら
            $id = Auth::id();
            $users = User::where('id', '!=', $id)->get(); //Auth認証されたユーザー以外を取得して表示する
        }
        return view('users.search', ['users' => $users, 'keyword' => $keyword]);
    }

    public function profile()
    {
        return view('users.profile');
    }
}
