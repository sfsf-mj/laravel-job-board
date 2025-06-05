<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // We use factory in this case to filling the defualt null values
        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password'=> bcrypt('123')
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password'=> bcrypt('123')
        ]);
    }
}
