<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;

class UserSeeder extends Seeder {

    public function run():void {

        $users = [
            [
                'display_name' => 'Lolo le zozo',
                'username' => 'nadrojria',
                'email' => 'miso_maven@umamifarm.net',
                'password' => Hash::make('pickle123'),
                'bio' => 'Fermenting my way through life one jar at a time 🫙 | Kimchi king 👑, kombucha brewer 🫧, and devoted sourdough parent 🍞 | Always down to talk about beneficial bacteria | Current obsession: water kefir experiments.',
                'created_at' => Carbon::parse('2025-01-25 10:30:00'),
                'updated_at' => Carbon::parse('2025-01-25 10:30:00'),
            ],
            [
                'display_name' => 'Houmous man',
                'username' => 'hazbraaaa',
                'email' => 'kombucha_king@brewmail.net',
                'password' => Hash::make('test'),
                'bio' => 'Wild fermentation advocate living the cultured life | Pickle perfectionist 🥒, cheese cave dweller 🧀, and guardian of ancient koji spores 🍄 | Always eager to share fermentation wisdom | Current obsession: experimenting with fermented fruit leather.',
                'created_at' => Carbon::parse('2025-01-18 10:30:00'),
                'updated_at' => Carbon::parse('2025-01-18 10:30:00'),
            ],
            [
                'display_name' => 'Leo',
                'username' => 'patatasbravas',
                'email' => 'sourdough_sally@fermentlife.com',
                'password' => Hash::make('ferment73'),
                'bio' => 'Transforming simple ingredients into microbial masterpieces | Tempeh devotee, kvass connoisseur, and tender of seven active fermentation projects 🧪 | Believer in the magic of beneficial microbes ✨ | Currently diving deep into traditional Korean rice wine brewing 🍶',
                'created_at' => Carbon::parse('2024-07-04 10:30:00'),
                'updated_at' => Carbon::parse('2024-07-04 10:30:00'),
            ],
            [
                'display_name' => 'Hestia',
                'username' => 'midiune',
                'email' => 'wild_yeast_whisperer@fermentopia.io',
                'password' => Hash::make('kimchibatch'),
                'bio' => 'Fermentation is my meditation 🧘‍♂️ | Dedicated to the art of controlled decay and cellular alchemy | Sourdough whisperer 🍞, jun enthusiast, and part-time mycology nerd 🍄 | Current fascination: exploring indigenous fermentation techniques from around the world 🌍',
                'created_at' => Carbon::parse('2024-12-13 10:30:00'),
                'updated_at' => Carbon::parse('2024-12-13 10:30:00'),
            ],
            [
                'display_name' => 'Emi',
                'username' => ' korogu972',
                'email' => 'cheese_cave_curator@lactoferment.co',
                'password' => Hash::make('kraut69'),
                'bio' => 'Living proof that good things come to those who wait (and ferment) ⏰ | Kraut crusher, beet kvass brewer, and devoted student of lacto-fermentation | Forever chasing that perfect umami balance | Currently obsessed with fermenting unusual vegetables 🥬 and pushing flavor boundaries.',
                'created_at' => Carbon::parse('2024-01-04 10:30:00'),
                'updated_at' => Carbon::parse('2024-01-04 10:30:00'),
            ],
            [
                'display_name' => 'Carinou',
                'username' => 'catsarethebest',
                'email' => 'kefir_enthusiast@probiotic.zone',
                'password' => Hash::make('probiointana'),
                'bio' => 'Cultured in every sense of the word | Probiotic pioneer 🦠, fermented tea evangelist 🍵, and keeper of bubbling countertop ecosystems | Passionate about gut health through ancient wisdom | Current project: mastering the art of homemade fish sauce 🐟 and aged miso varieties.',
                'created_at' => Carbon::parse('2024-09-04 10:30:00'),
                'updated_at' => Carbon::parse('2024-09-04 10:30:00'),
            ],
            [
                'display_name' => 'Caro',
                'username' => 'bulbibulbi',
                'email' => 'tempeh_artisan@moldymagic.org',
                'password' => Hash::make('scobyscoby'),
                'bio' => 'Bubbling with curiosity 🫧 about all things fermented | Sauerkraut enthusiast, miso maker, and proud keeper of three sourdough starters 🍞 | Currently perfecting my tepache recipe and falling in love with lacto-fermented hot sauces 🌶️',
                'created_at' => Carbon::parse('2024-10-01 10:30:00'),
                'updated_at' => Carbon::parse('2024-10-01 10:30:00'),
            ],
            [
                'display_name' => 'Flaya',
                'username' => 'flayaticone',
                'email' => 'sauerkraut_scientist@cabbage.club',
                'password' => Hash::make('tepachedragon'),
                'bio' => 'Embracing the slow food revolution 🐌 one ferment at a time | Kombucha scobys collector, wild yeast hunter, and fermentation workshop leader | Spreading the gospel of beneficial bacteria 🦠 | Currently exploring: traditional African fermented beverages 🍺 and their cultural significance.',
                'created_at' => Carbon::parse('2024-06-22 10:30:00'),
                'updated_at' => Carbon::parse('2024-06-22 10:30:00'),
            ]
        ];

        User::insert($users);
    }

}