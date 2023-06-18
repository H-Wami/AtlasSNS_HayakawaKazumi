<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'following_id', 'follows.id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 新規投稿リレーション定義 Userから見て複数
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // フォローしているユーザー(フォロー)　リレーション定義　多×多
    // (関係するモデル、中間テーブル名、接続元の中間テーブルカラム、接続したい中間テーブルカラム)
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    // フォローされているユーザー(フォロワー)　リレーション定義　多×多
    // (関係するモデル、中間テーブル名、接続元の中間テーブルカラム、接続したい中間テーブルカラム)
    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    // フォローしているかの判定
    public function isFollowing(Int $user_id) //Int=正数型の変数
    {
        return (bool) $this->follows()->where("followed_id", $user_id)->first(['follows.id']); // boolean=値があるか判定。 followed_idにuser_idがあればfollowsテーブルのID(テーブル名.id)を取得する(first)
    }

    // フォローされているかの判定
    public function isFollowed(Int $user_id) //Int=正数型の変数
    {
        return (bool) $this->follows()->where("following_id", $user_id)->first(['follows.id']); // boolean=値があるか判定。 following_idにuser_idがあればfollowsテーブルのID(テーブル名.id)を取得する(first)
    }

    //フォロー解除
    public function unfollow(Int $user_id) //Int=正数型の変数
    {
        return $this->follows()->detach($user_id); //フォローしているユーザーをdetach=中間テーブルへのデータ削除(delete)
    }

    //フォロー
    public function follow(Int $user_id) //Int=正数型の変数
    {
        return $this->follows()->attach($user_id); //フォローしているユーザーをattach=中間テーブルへのデータ登録(create)
    }
}
