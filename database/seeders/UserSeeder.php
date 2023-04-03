<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Amdadul Haq',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Mozahidul Islam',
            'email' => 'mozahid@tests.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);

        // User
        User::create([
            'name' => 'Amdad',
            'email' => 'amdad@test.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Mozahid',
            'email' => 'mozahid@test.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
