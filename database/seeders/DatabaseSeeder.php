<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostSeeder;

class DatabaseSeeder extends Seeder {

    public function run():void {

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
        ]);
    }

}