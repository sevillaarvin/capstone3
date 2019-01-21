<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("posts")->delete();
        \DB::table("posts")->insert([
            [
                "title" => "Post Title 1",
                "content" => "Post Content 1",
                "image" => "",
                "user_id" => "2",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "title" => "Post Title 2",
                "content" => "Post Content 2",
                "image" => "",
                "user_id" => "3",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "title" => "Post Title 3",
                "content" => "Post Content 3",
                "image" => "",
                "user_id" => "2",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
