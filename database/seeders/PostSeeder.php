<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Post;

class PostSeeder extends Seeder {
    
    public function run():void {

        $posts = [
            [
                'user_id' => 3,
                'description' => 'Looking for lactic acid fermentation beginner guides 📚. Any useful resources to share?',
                'created_at' => Carbon::parse('2025-03-15 10:30:00'),
                'updated_at' => Carbon::parse('2025-03-15 10:30:00'),
            ],
            [
                'user_id' => 1,
                'description' => 'Feeling like pickling some cabbages today! 🥬🥒',
                'created_at' => Carbon::parse('2025-03-18 18:23:00'),
                'updated_at' => Carbon::parse('2025-03-18 18:23:00'),
            ],
            [
                'user_id' => 2,
                'description' => 'Made some awesome cucumber kimchi yesterday! 🥒🌶️✨',
                'created_at' => Carbon::parse('2025-03-18 21:15:00'),
                'updated_at' => Carbon::parse('2025-03-18 21:15:00'),
            ],
            [
                'user_id' => 6,
                'description' => 'Giving free kefir grains . Hand delivery in Lyon only 🚚. DM me if you want some! 💬',
                'created_at' => Carbon::parse('2025-03-20 09:47:00'),
                'updated_at' => Carbon::parse('2025-03-20 09:47:00'),
            ],
            [
                'user_id' => 8,
                'description' => 'Have you ever tasted pepperoni and jalapeños sourdough loaf 🍞? 10 out 10 would recommend! 🌶️⭐',
                'created_at' => Carbon::parse('2025-03-20 14:33:00'),
                'updated_at' => Carbon::parse('2025-03-20 14:33:00'),
            ],
            [
                'user_id' => 4,
                'description' => 'Day 12 of my first attempt at black garlic fermentation 🧄 and the aroma is absolutely incredible! The cloves are getting that deep, molasses-like sweetness ✨. Anyone else obsessed with this magical transformation?',
                'created_at' => Carbon::parse('2025-03-21 11:01:00'),
                'updated_at' => Carbon::parse('2025-03-21 11:01:00'),
            ],
            [
                'user_id' => 7,
                'description' => 'My sourdough starter "Bubbles" just doubled in 4 hours today 🍞! The cooler weather must be making her happy ❄️. Time to bake some tangzhong loaves. What\'s your starter\'s name and personality? 🫧',
                'created_at' => Carbon::parse('2025-03-21 15:41:00'),
                'updated_at' => Carbon::parse('2025-03-21 15:41:00'),
            ],
            [
                'user_id' => 5,
                'description' => 'Just tasted my 6-month aged miso and WOW 🤯! The depth of flavor compared to store-bought is mind-blowing. The patience was so worth it ⏰! Already planning my next batch with different koji varieties 🍄',
                'created_at' => Carbon::parse('2025-03-22 07:32:00'),
                'updated_at' => Carbon::parse('2025-03-22 07:32:00'),
            ],
        ];

        Post::insert($posts);
    }

}