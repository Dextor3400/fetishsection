<?php

use Illuminate\Database\Seeder;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(MediaTableSeeder::class);
        $this->call(ConcertTableSeeder::class);
        factory(App\User::class,100)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });
        factory(App\Comment::class,500)->create();
        factory(App\Comment_reply::class,1000)->create();
    }
}
