<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("likes")->delete();
        \DB::table("likes")->insert([
            [
                "user_id" => 2,
                "likeable_id" => 1,
                "likeable_type" => "Yeet\Post",
                "liked" => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "user_id" => 3,
                "likeable_id" => 1,
                "likeable_type" => "Yeet\Post",
                "liked" => false,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "user_id" => 4,
                "likeable_id" => 1,
                "likeable_type" => "Yeet\Post",
                "liked" => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "user_id" => 2,
                "likeable_id" => 1,
                "likeable_type" => "Yeet\Comment",
                "liked" => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "user_id" => 4,
                "likeable_id" => 1,
                "likeable_type" => "Yeet\Comment",
                "liked" => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
