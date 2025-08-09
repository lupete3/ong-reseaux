<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Demo',
                'password' => bcrypt('password'),
            ]
        );

        Post::create([
            'title' => 'Lancement de notre programme de bourses',
            'content' => "Nous sommes fiers d'annoncer le lancement de nouvelles bourses pour les étudiants méritants...",
            'category' => 'Éducation',
            'image' => 'template/img/blog-1.jpg',
            'user_id' => $user->id,
        ]);

        Post::create([
            'title' => 'Campagne de vaccination réussie',
            'content' => "Plus de 5000 personnes ont bénéficié de notre dernière campagne de vaccination dans la région...",
            'category' => 'Santé',
            'image' => 'template/img/blog-2.jpg',
            'user_id' => $user->id,
        ]);

        Post::create([
            'title' => 'Opération de reboisement communautaire',
            'content' => "Rejoignez-nous pour notre prochaine journée de reboisement. Ensemble, plantons l'avenir...",
            'category' => 'Environnement',
            'image' => 'template/img/blog-3.jpg',
            'user_id' => $user->id,
        ]);
    }
}