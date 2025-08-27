<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Enums\RoleEnum;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'last_name' => 'Super',
            'first_name' => 'Admin',
            'middle_name' => null,
            'email' => 'example@'.config('app.url'),
            'username' => 'SuperAdmin',
            'role' => RoleEnum::ADMIN,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
