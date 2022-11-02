<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $users = [

            [

                'name' => 'Ahmad Rafli',
                'email' => 'rafli@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'admin',
                'no_induk' => '3007202201001',
                'gambar' => 'default.jpg',

            ],

            [

                'name' => 'Ainurrahman',
                'email' => 'ainurrahman@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'supervisor',
                'no_induk' => '3007202201002',
                'gambar' => 'default.jpg',

            ],
            [

                'name' => 'Handika Adytia',
                'email' => 'handikaadytiasg@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'freelancer',
                'no_induk' => '3007202201003',
                'gambar' => 'default.jpg',

            ],
            [

                'name' => 'Anak baru',
                'email' => 'baru@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'none',
                'no_induk' => '3007202201004',
                'gambar' => 'default.jpg',

            ],

        ];

        foreach ($users as $key => $user) {

            User::create($user);
        }

    }
}
