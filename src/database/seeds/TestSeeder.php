<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
        //$this->createArticles();
        //$this->createSubscribers();
    }

    private function createUsers(): void
    {
        // Admin
        factory(\App\Models\User::class, 1)->create([
            'email' => 'test.admin@example.org',
            'privilege_id' => 1,
        ]);
        // User
        factory(\App\Models\User::class, 1)->create([
            'email' => 'test.user@example.org',
            'privilege_id' => 2,
        ]);
        // Guests
        factory(\App\Models\User::class, 1)->create([
            'email' => 'test.guest@example.org',
            'privilege_id' => 3,
        ]);
    }

//    private function createArticles()
//    {
//        factory(\App\Models\Article::class, 5)->create();
//    }
//
//    private function createSubscribers()
//    {
//        factory(\App\Models\Subscriber::class, 25)->create();
//    }
}
