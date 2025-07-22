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
        User::factory()->create([
            'display_name' => 'Sally La Zozo',
            'username' => 'User Zozo',
            'email' => 'atest@code.com',
            'password' => Hash::make('testing')
        ]);
        
    }
}
