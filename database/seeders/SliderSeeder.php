<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'title' => 'Connecter les Acteurs du Développement en Afrique',
            'subtitle' => 'Un Réseau pour le Changement',
            'image' => 'template/img/carousel-1.jpg',
            'button1_text' => 'En Savoir Plus',
            'button1_url' => '#about',
            'button2_text' => 'Voir les Activités',
            'button2_url' => '#blog',
            'order' => 1,
        ]);

        Slider::create([
            'title' => 'Partagez vos actions avec un public plus large',
            'subtitle' => 'Visibilité et Impact',
            'image' => 'template/img/carousel-2.jpg',
            'button1_text' => 'Rejoindre le réseau',
            'button1_url' => '/register',
            'button2_text' => 'Nous Contacter',
            'button2_url' => '#contact',
            'order' => 2,
        ]);
    }
}