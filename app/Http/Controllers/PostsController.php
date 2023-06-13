<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //読み込み機能
    public function index()
    {
        $posts = Post::get(); //Postモデル（postsテーブル）からレコード情報を取得
        return view('posts.index', ['posts' => $posts]);
    }

    //新規投稿機能
    public function createPost(Request $request)
    {
        //バリデーション定義・メッセージ
        $request->validate(
            [
                'newPost' => 'min:1|required|max:150'
            ],
            [
                "min" => "1文字以上で入力して下さい。",
                "required" => "入力必須です。",
                "max" => "150文字以下で入力して下さい。"
            ]
        );

        $post = $request->input('newPost'); //入力されたものを$postにする
        Post::create(['post' => $post, 'user_id' => Auth::id()]); //$postとユーザーIDを作成し保存。 カラム名 => 値
        return back();
    }

    // 投稿削除機能
    public function deletePost($id)
    {
        Post::where('id', $id)->delete(); //Postに入っているidを消す
        return redirect('/top');
    }

    // // 投稿更新機能
    // public function updatePost(Request $request)
    // {
    //     $post = $request->input('updatePost');
    //     // Post::where('post' => $post, 'id' => $post)->first();
    //     return view('posts.updatePost', ['post' => $post]);
    // }
}
