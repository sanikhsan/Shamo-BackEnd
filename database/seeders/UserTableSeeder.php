<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Admin Shamo',
            'email' => 'admin@shamo.dev',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin@shamo.dev'),
            'username' => 'Administrator',
            'roles' => 'ADMIN'
        ];

        User::create($admin);
    }
}
