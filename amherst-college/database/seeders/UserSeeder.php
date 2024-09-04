<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Amherst Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('testpass'),
            'is_admin' => true,
            'bio' => 'Admin user for Amherst College',
        ]);

        User::factory()->count(2)->state(['is_admin' => true])->create([
            'password' => Hash::make('testpass'),
            'bio' => 'Admin user for Amherst College',
        ]);

        User::factory()->count(5)->create([
            'password' => Hash::make('testpass'),
            'bio' => 'Non-Admin user for Amherst College',
        ]);
    }
}