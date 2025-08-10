<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['key' => 'site_name', 'value' => 'Plateforme Partenaire']);
        Setting::create(['key' => 'slogan', 'value' => 'Rejoignez notre réseau pour amplifier votre impact.']);
        Setting::create(['key' => 'logo', 'value' => '']);
        Setting::create(['key' => 'address', 'value' => '123 Rue de l\'Exemple, 75000 Paris']);
        Setting::create(['key' => 'email', 'value' => 'contact@example.com']);
        Setting::create(['key' => 'phone', 'value' => '+33 1 23 45 67 89']);
        Setting::create(['key' => 'twitter_url', 'value' => '#']);
        Setting::create(['key' => 'facebook_url', 'value' => '#']);
        Setting::create(['key' => 'linkedin_url', 'value' => '#']);
        Setting::create(['key' => 'feature_image', 'value' => '']);
    }
}
