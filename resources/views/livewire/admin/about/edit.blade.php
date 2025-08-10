<?php

use Livewire\Volt\Component;
use App\Models\About;

new class extends Component {
    public About $about;

    public string $title = '';
    public string $subtitle = '';
    public string $content = '';
    public string $video_url = '';
    public string $features_text = ''; // Textarea for features

    public function mount(): void
    {
        // There should only be one record.
        $this->about = About::firstOrFail();
        
        $this->title = $this->about->title;
        $this->subtitle = $this->about->subtitle;
        $this->content = $this->about->content;
        $this->video_url = $this->about->video_url;
        // Convert the JSON array of features back into a newline-separated string for the textarea
        $this->features_text = implode(', ', json_decode($this->about->features));

        
    }

    public function update(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'video_url' => ['required', 'url'],
            'features_text' => ['required', 'string'],
        ]);

        // Convert the newline-separated string from the textarea back into an array
        $featuresArray = json_encode(array_map('trim', explode(',', $this->features_text)));

        $this->about->update([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'content' => $validated['content'],
            'video_url' => $validated['video_url'],
            'features' => $featuresArray,
        ]);

        // Optionally, add a success message
        session()->flash('status', 'Page "À propos" mise à jour avec succès.');
    }
};
?>

<div>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Admin /</span> Page "À Propos"
    </h4>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Modifier le contenu de la page "À Propos"</h5>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form wire:submit="update">
                <div class="mb-3">
                    <label class="form-label" for="title">Titre principal</label>
                    <input type="text" class="form-control" id="title" wire:model="title">
                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="subtitle">Sous-titre</label>
                    <input type="text" class="form-control" id="subtitle" wire:model="subtitle">
                    @error('subtitle') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="content">Contenu principal</label>
                    <textarea id="content" class="form-control" wire:model="content" rows="8"></textarea>
                    @error('content') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="video_url">URL de la vidéo</label>
                    <input type="url" class="form-control" id="video_url" wire:model="video_url">
                    @error('video_url') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="features_text">Points clés (un par ligne)</label>
                    <textarea id="features_text" class="form-control" wire:model="features_text" rows="5"></textarea>
                    <div class="form-text">Chaque ligne deviendra un point de liste avec une coche.</div>
                    @error('features_text') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Mettre à jour</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Mise à jour...
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>