<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'La première plateforme de networking pour les organisations en Afrique',
            'subtitle' => 'À Propos de Nous',
            'content' => "Nous sommes une organisation basée en Afrique dont la mission est de fédérer les acteurs du changement. Nous avons créé un écosystème numérique où les organisations, associations et collectifs peuvent se connecter, partager leurs expériences et collaborer pour un impact plus grand. Notre plateforme offre les outils nécessaires pour amplifier la voix de chaque membre et valoriser les initiatives locales à l'échelle du continent et au-delà.",
            'video_url' => 'https://www.youtube.com/embed/a_q_I-h2QyY',
            'features' => json_encode([
                'Réseau Panafricain',
                'Membres Vérifiés',
                'Partage Facilité',
                'Support Dédié',
            ]),
        ]);
    }
}