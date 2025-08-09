<?php

namespace App\Livewire;

use App\Models\TeamMember;
use Livewire\Component;

class ShowTeamMembers extends Component
{
    public function render()
    {
        $teamMembers = TeamMember::all();
        return view('livewire.show-team-members', [
            'teamMembers' => $teamMembers
        ]);
    }
}
