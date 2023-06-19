<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }
}
