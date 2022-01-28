<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'luca.pitzoi',
                'email' => 'luca.pitzoi@herzum.com',
                'password' => bcrypt('admin123'),
                'privilege_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
