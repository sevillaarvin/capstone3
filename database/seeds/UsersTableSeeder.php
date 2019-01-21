<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("users")->delete();
        \DB::table("users")->insert([
            [
                "name" => "admin",
                "username" => "admin",
                "email" => "admin@admin.com",
                "password" => bcrypt("admin"),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "role_id" => \DB::table("roles")->where("name", "admin")->first()->id,
            ],
            [
                "name" => "user",
                "username" => "user",
                "email" => "user@user.com",
                "password" => bcrypt("user"),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "role_id" => \DB::table("roles")->where("name", "user")->first()->id,
            ],
            [
                "name" => "user2",
                "username" => "user2",
                "email" => "user2@user.com",
                "password" => bcrypt("user2"),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "role_id" => \DB::table("roles")->where("name", "user")->first()->id,
            ],
            [
                "name" => "user3",
                "username" => "user3",
                "email" => "user3@user.com",
                "password" => bcrypt("user3"),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "role_id" => \DB::table("roles")->where("name", "user")->first()->id,
            ],
            [
                "name" => "user4",
                "username" => "user4",
                "email" => "user4@user.com",
                "password" => bcrypt("user4"),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "role_id" => \DB::table("roles")->where("name", "user")->first()->id,
            ],
        ]);
    }
}
