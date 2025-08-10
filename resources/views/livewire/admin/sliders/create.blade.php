<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;

new class extends Component {
    use WithFileUploads;

    public string $title = '';
    public string $subtitle = '';
    public $image;
    public string $button1_text = '';
    public string $button1_url = '';
    public string $button2_text = '';
    public string $button2_url = '';
    public int $order = 0;

    public function save(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
            'button1_text' => ['required', 'string', 'max:255'],
            'button1_url' => ['required', 'url', 'max:255'],
            'button2_text' => ['required', 'string', 'max:255'],
            'button2_url' => ['required', 'url', 'max:255'],
            'order' => ['required', 'integer'],
        ]);

        $validated['image'] = $this->image->store('sliders', 'public');

        Slider::create($validated);

        $this->redirectRoute('admin.sliders.index', navigate: true);
    }
}; ?>

<div>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Admin / Sliders /</span> Ajouter
    </h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Ajouter un nouveau slider</h5>
        </div>
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3">
                    <label class="form-label" for="title">Titre</label>
                    <input type="text" class="form-control" id="title" placeholder="Titre du slider" wire:model="title">
                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="subtitle">Sous-titre</label>
                    <input type="text" class="form-control" id="subtitle" placeholder="Sous-titre du slider" wire:model="subtitle">
                    @error('subtitle') <div class="text-danger">{{ $message }}</div> @enderror
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

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button1_text">Texte Bouton 1</label>
                            <input type="text" class="form-control" id="button1_text" placeholder="Ex: En savoir plus" wire:model="button1_text">
                            @error('button1_text') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button1_url">URL Bouton 1</label>
                            <input type="url" class="form-control" id="button1_url" placeholder="https://example.com" wire:model="button1_url">
                            @error('button1_url') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button2_text">Texte Bouton 2</label>
                            <input type="text" class="form-control" id="button2_text" placeholder="Ex: Contactez-nous" wire:model="button2_text">
                            @error('button2_text') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button2_url">URL Bouton 2</label>
                            <input type="url" class="form-control" id="button2_url" placeholder="https://example.com" wire:model="button2_url">
                            @error('button2_url') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="order">Ordre</label>
                    <input type="number" class="form-control" id="order" placeholder="0" wire:model="order">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Enregistrer</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enregistrement...
                    </span>
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary" wire:navigate>Annuler</a>
            </form>
        </div>
    </div>
</div>