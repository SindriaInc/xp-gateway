<?php

use Illuminate\Database\Seeder;

class UserPrivilegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Admin', 'short' => 'A'],
            ['name' => 'User', 'short' => 'U'],
            ['name' => 'Guest', 'short' => 'G'],
        ];

        DB::table('user_privileges')->insert($data);
    }
}
