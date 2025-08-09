<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public function render()
    {
        $posts = Post::latest()->take(3)->get();
        return view('livewire.show-posts', [
            'posts' => $posts
        ]);
    }
}