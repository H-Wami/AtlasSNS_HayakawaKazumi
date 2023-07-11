<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
// Storageクラス使用
use Illuminate\Support\Facades\Storage;
// RegisterFormRequest使用
use App\Http\Requests\ProfileFormRequest;

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

    // プロフィール表示
    public function profile($id)
    {
        $users = User::where('id',$id)->get(); //$idのusersテーブル情報を取得。
        $posts = Post::where('user_id', $id)->latest()->get();//$idのpostsテーブル情報を取得。
        return view('users.profile', ['users' => $users, 'posts' => $posts]);
    }

    // プロフィール編集(更新)機能
    public function updateUser(ProfileFormRequest $request)
    {
        $user = Auth::user(); //ログインユーザーのusersテーブルの情報を取得。

        $update = [
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'bio' => $request->input('bio')
        ]; //入力したユーザー名・メールアドレス・自己紹介文を取得。
        // dd($update);

        if ($request->filled('password')){ //もしパスワードに値があったら filled() 指定したキーの有無 && 値が入力されているか
            $update['password'] = bcrypt($request->input('password')); //値を保存する。 $変数['']= 要素の追加
        }

        if ($request->file('images')){ //もし画像ファイルがあったら　file() ファイルを取得
            $filename = $request->images->getClientOriginalName(); //元々のファイル名をつける
            $file = $request->images->storeAs('',$filename,'public'); //publicに保存
            $path = Storage::url($file); //画像のパス(URL)を取得
            $update['images'] = $filename; //値を保存する。 $変数['']= 要素の追加
        }

        $user->update($update); //更新機能実行

        return redirect('/top');
    }
}
