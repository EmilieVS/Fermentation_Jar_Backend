<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder {

    public function run():void {

        $users = [
            [
                'displayName' => 'Lolo le zozo',
                'username' => 'nadrojria',
                'email' => 'miso_maven@umamifarm.net',
                'password' => Hash::make('pickle123'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Houmous man',
                'username' => 'hazbraaaa',
                'email' => 'kombucha_king@brewmail.net',
                'password' => Hash::make('kombuchafather'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Leo',
                'username' => 'patatasbravas',
                'email' => 'sourdough_sally@fermentlife.com',
                'password' => Hash::make('ferment73'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Hestia',
                'username' => 'midiune',
                'email' => 'wild_yeast_whisperer@fermentopia.io',
                'password' => Hash::make('kimchibatch'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Emi',
                'username' => ' korogu972',
                'email' => 'cheese_cave_curator@lactoferment.co',
                'password' => Hash::make('kraut69'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Carinou',
                'username' => 'catsarethebest',
                'email' => 'kefir_enthusiast@probiotic.zone',
                'password' => Hash::make('probiointana'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Caro',
                'username' => 'bulbibulbi',
                'email' => 'tempeh_artisan@moldymagic.org',
                'password' => Hash::make('scobyscoby'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Sally La Zozo',
                'username' => 'User Zozo',
                'email' => 'atest@code.com',
                'password' => Hash::make('testing'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'displayName' => 'Flaya',
                'username' => 'flayaticone',
                'email' => 'sauerkraut_scientist@cabbage.club',
                'password' => Hash::make('tepachedragon'),
                'bio' => 'Edit your profile for changing your bio.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        User::insert($users);
    }

}