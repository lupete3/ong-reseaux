<?php

namespace App\Livewire;

use App\Models\Achievement;
use Livewire\Component;

class ShowAchievements extends Component
{
    public function render()
    {
        $achievements = Achievement::latest('date')->take(6)->get();
        return view('livewire.show-achievements', [
            'achievements' => $achievements
        ]);
    }
}