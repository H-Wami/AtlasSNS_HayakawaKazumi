<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期値作成
        DB::table('follows')->insert([
            [
                'following_id' => '918',
                'followed_id' => '963',
            ],
            [
                'following_id' => '918',
                'followed_id' => '961',
            ],
            [
                'following_id' => '963',
                'followed_id' => '918',
            ]
        ]);
    }
}
