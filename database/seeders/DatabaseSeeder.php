<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SliderSeeder::class,
            AboutSeeder::class,
            FeatureSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            PartnerSeeder::class,
            PostSeeder::class,
            AchievementSeeder::class,
        ]);
    }
}
