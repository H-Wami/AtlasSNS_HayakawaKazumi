<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザー作成
        DB::table('users')->insert([
            'username' => '早川和美',
            'mail' => 'firstuser@icloud.com',
            'password' => bcrypt('wami0927')

        ]);
    }
}
