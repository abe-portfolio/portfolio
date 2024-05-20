<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '一般ユーザー1',
                'email' => 'user1@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1589571894960-20bbe2828d0a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=350&q=80'
            ],
            [
                'name' => '一般ユーザー_2',
                'email' => 'user2@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80+750w'
            ],
            [
                'name' => '一般ユーザー_3',
                'email' => 'user3@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1677651647819-e590284af894?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDE0MHxibzhqUUtUYUUwWXx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '一般ユーザー_4',
                'email' => 'user4@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1672644088743-d72bd78b758e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDEyMnxibzhqUUtUYUUwWXx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '一般ユーザー_5',
                'email' => 'user5@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1678245687839-231ed039a18b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDEyNHxibzhqUUtUYUUwWXx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '企業ユーザー_1',
                'email' => 'company91@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1678222453727-00e17c2e582e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDExMHxibzhqUUtUYUUwWXx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '企業ユーザー_2',
                'email' => 'company92@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1678491455103-4c0502b86f6f?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=350&q=80'
            ],
            [
                'name' => '企業ユーザー_3',
                'email' => 'company93@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1678132673624-1a1cf4cdd6fe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDEwNnxibzhqUUtUYUUwWXx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '企業ユーザー_4',
                'email' => 'company94@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1631995390084-cb82295cd2c0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDY1fGJvOGpRS1RhRTBZfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '企業ユーザー_5',
                'email' => 'company95@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1679345506039-c4228a79c93a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDM0fGJvOGpRS1RhRTBZfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=60'
            ],
            [
                'name' => '管理ユーザー_',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'img_url' => 'https://images.unsplash.com/photo-1681407606460-332fa77a8a66?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1MXx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=60'
            ],
        ]);
    }
}
