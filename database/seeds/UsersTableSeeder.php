<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rad Saskara',
            'email' => 'rad@rad.com',
            'password' => Hash::make('password'),
            'phone' => '911',
            'role' => 'Admin'
        ]);
        User::create([
            'name' => 'Rads',
            'email' => 'radit@rad.com',
            'password' => Hash::make('password'),
            'phone' => '911',
            'role' => 'User'
        ]);
    }
}
