<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //書き換え可能。
    protected $fillable = [
        'post', 'user_id'
    ];

    //新規投稿リレーション定義 Postから見て単数
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

// 誰の投稿か posts user_id 1つ  表示させたい users username 多数
