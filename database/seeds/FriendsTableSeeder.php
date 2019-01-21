<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("friends")->delete();
        \DB::table("friends")->insert([
            [
                "user_id" => 2,
                "friend_id" => 3,
                "accepted" => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "user_id" => 2,
                "friend_id" => 4,
                "accepted" => false,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
