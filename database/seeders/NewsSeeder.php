<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->first();
        if ($admin) {
            News::factory(10)->create([
                'user_id' => $admin->id
            ]);
        }
    }
}
