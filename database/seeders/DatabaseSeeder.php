<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone'=>'1234567891',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'phone' => '9876543210',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Demo',
                'email' => 'demo@gmail.com',
                'phone' => '9804010079',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        User::insert($data);
    }
}
