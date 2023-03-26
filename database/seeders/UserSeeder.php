<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        collect([

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ],
                [
                    'name' => 'Deva Apriana',
                    'email' => 'deva@gmail.com',
                    'password' => bcrypt('password'),
                    'email_verified_at' => now()
                ]

        ])->each(fn ($user) => \App\Models\User::create($user));




        collect(['admin', 'moderator'])->each(function($data){
            \App\Models\Role::create(['name' => $data]);
        });

        User::find(1)->roles()->attach([1]);
        User::find(2)->roles()->attach([2]);
    }
}
