<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FollowsController extends Controller
{
    //フォロー解除機能
    public function unfollow(User $user)
    {
        $follower = Auth::user(); //Auth認証している=ログイン中のユーザー
        $is_following = $follower->isFollowing($user->id); //フォローしているか値があるか確認
        if($is_following) { //もしフォローしていたら
            $follower -> unfollow($user->id); //フォロー解除する
            return back();
        }
    }

    //フォロー機能
    public function follow(User $user)
    {
        $follower = Auth::user(); //Auth認証している=ログイン中のユーザー
        $is_following = $follower->isFollowing($user->id); //フォローしているか値があるか確認
        if (!$is_following) { //もしフォローしていなければ
            $follower->follow($user->id); //フォローする
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
