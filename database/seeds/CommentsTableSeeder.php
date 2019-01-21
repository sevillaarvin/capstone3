<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("comments")->delete();
        \DB::table("comments")->insert([
            [
                "comment" => "I'm a comment",
                "commentable_id" => 1,
                "commentable_type" => "Yeet\Post",
                "user_id" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "comment" => "I'm a comment in a comment",
                "commentable_id" => 1,
                "commentable_type" => "Yeet\Comment",
                "user_id" => 3,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "comment" => "I'm a comment 3",
                "commentable_id" => 1,
                "commentable_type" => "Yeet\Post",
                "user_id" => 4,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
