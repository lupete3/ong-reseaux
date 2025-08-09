<?php

namespace App\Livewire;

use App\Models\Feature;
use Livewire\Component;

class ShowFeatures extends Component
{
    public function render()
    {
        $features = Feature::all();
        return view('livewire.show-features', [
            'features' => $features
        ]);
    }
}
