<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Test User1',
            'email' => 'test1@example.com',
            'role_id' => 2
        ]);

        $user->profile()->create([
            'gender' => 'Male',
        ]);
    }
}
