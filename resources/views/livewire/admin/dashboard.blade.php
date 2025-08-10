<?php

use Livewire\Volt\Component;
use App\Models\Post;
use App\Models\TeamMember;
use App\Models\Partner;
use App\Models\ContactMessage;

new class extends Component {
    public $postCount;
    public $teamMemberCount;
    public $partnerCount;
    public $contactMessageCount;
    public $recentPosts;
    public $recentMessages;

    public function mount()
    {
        $this->postCount = Post::count();
        $this->teamMemberCount = TeamMember::count();
        $this->partnerCount = Partner::count();
        $this->contactMessageCount = ContactMessage::count();
        $this->recentPosts = Post::latest()->take(5)->get();
        $this->recentMessages = ContactMessage::latest()->take(5)->get();
    }
}; ?>

<div>
    <div class="py-5">
        <div class="row g-4">
            <!-- Stat Cards -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-newspaper fa-3x me-3"></i>
                        <div>
                            <div class="d-flex justify-content-between">
                                <h3 class="text-white">{{ $postCount }}</h3>
                            </div>
                            <span>Articles Publiés</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.posts.index') }}">Voir les détails</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-users fa-3x me-3"></i>
                        <div>
                            <div class="d-flex justify-content-between">
                                <h3 class="text-white">{{ $teamMemberCount }}</h3>
                            </div>
                            <span>Membres de l'équipe</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.team-members.index') }}">Voir les détails</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-handshake fa-3x me-3"></i>
                        <div>
                            <div class="d-flex justify-content-between">
                                <h3 class="text-white">{{ $partnerCount }}</h3>
                            </div>
                            <span>Partenaires</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.partners.index') }}">Voir les détails</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa fa-envelope fa-3x me-3"></i>
                        <div>
                            <div class="d-flex justify-content-between">
                                <h3 class="text-white">{{ $contactMessageCount }}</h3>
                            </div>
                            <span>Messages Reçus</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.messages.index') }}">Voir les détails</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Posts -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-newspaper me-1"></i>
                        Derniers Articles
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse($recentPosts as $post)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a>
                                    <span class="badge bg-primary rounded-pill">{{ $post->created_at->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="list-group-item">Aucun article pour le moment.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Recent Messages -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-envelope me-1"></i>
                        Derniers Messages de Contact
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse($recentMessages as $message)
                                <a href="{{ route('admin.messages.show', $message) }}" class="list-group-item list-group-item-action">
                                    <strong>{{ $message->name }}</strong> ({{ $message->email }})
                                    <p class="mb-1 mt-1">{{ Str::limit($message->message, 50) }}</p>
                                    <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                </a>
                            @empty
                                <li class="list-group-item">Aucun message pour le moment.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>