<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Str;

new class extends Component {
    use WithFileUploads;

    public string $title = '';
    public string $content = '';
    public $image;
    public string $status = 'draft';

    public function save(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'], // 2MB Max
            'status' => ['required', 'in:published,draft'],
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('posts', 'public');
        }

        Post::create($validated);

        $this->redirectRoute('admin.posts.index', navigate: true);
    }
}; ?>

<div>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Admin / Articles /</span> Créer
    </h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Créer un nouvel article</h5>
        </div>
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3">
                    <label class="form-label" for="title">Titre</label>
                    <input type="text" class="form-control" id="title" placeholder="Titre de l'article" wire:model="title">
                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="content">Contenu</label>
                    <textarea id="content" class="form-control" placeholder="Contenu de l'article" wire:model="content" rows="5"></textarea>
                    @error('content') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" wire:model="image">
                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror

                    @if ($image)
                        <div class="mt-3">
                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status">Statut</label>
                    <select class="form-select" id="status" wire:model="status">
                        <option value="draft">Brouillon</option>
                        <option value="published">Publié</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Enregistrer</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enregistrement...
                    </span>
                </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary" wire:navigate>Annuler</a>
            </form>
        </div>
    </div>
</div>