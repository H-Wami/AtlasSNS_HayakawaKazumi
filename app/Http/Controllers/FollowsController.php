<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //フォロー解除機能
    public function unfollow(Int $user_id)
    {
        $follower = Auth::user(); //Auth認証している=ログイン中のユーザー
        $is_following = $follower->isFollowing($user_id); //フォローしているか値があるか確認
        if($is_following) { //もしフォローしていたら
            $follower -> unfollow($user_id); //フォロー解除する
            return back();
        }
    }

    //フォロー機能
    public function follow(Int $user_id)
    {
        $follower = Auth::user(); //Auth認証している=ログイン中のユーザー
        $is_following = $follower->isFollowing($user_id); //フォローしているか値があるか確認
        if (!$is_following) { //もしフォローしていなければ
            $follower->follow($user_id); //フォローする
            return back();
        }
    }

    //フォローリスト表示機能
    public function followList()
    {
        //アイコン一覧表示
        $follows = Auth::User()->follows()->get();//ログインユーザーがフォローしている人を表示する
        //投稿一覧表示
        $following_id = Auth::user()->follows()->pluck('followed_id'); // ログインユーザーが誰をフォローしているのかfollowing_idを取得(pluck)。
        $posts = Post::with('user')->whereIn('user_id', $following_id)->latest()->get();//Postモデル（postsテーブル）からuserテーブルのuser_idと$following_idが同じ投稿を昇順で取得。('基準カラム名','条件')
        return view('follows.followList', ['follows' => $follows,'posts' => $posts]);
    }

    //フォロワーリスト表示機能
    public function followerList()
    {
        //アイコン一覧表示
        $followers = Auth::User()->followers()->get();//ログインユーザーがフォローされている人を表示する

        return view('follows.followerList',['followers' => $followers]);
    }
}
