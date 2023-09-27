<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'staff',
            'name' => 'Agus Cahyno',
            'email' => 'staff1@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('staff123'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role' => 'staff',
            'name' => 'Andini Putri',
            'email' => 'staff2@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('staff123'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role' => 'staff',
            'name' => 'Tika Putri',
            'email' => 'staff3@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('staff123'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role' => 'staff',
            'name' => 'Riri Dwi',
            'email' => 'staff4@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('staff123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
