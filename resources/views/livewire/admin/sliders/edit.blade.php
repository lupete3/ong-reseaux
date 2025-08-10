<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads;

    public Slider $slider;

    public string $title = '';
    public string $subtitle = '';
    public $new_image;
    public string $button1_text = '';
    public string $button1_url = '';
    public string $button2_text = '';
    public string $button2_url = '';
    public int $order = 0;

    public function mount(Slider $slider): void
    {
        $this->slider = $slider;
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->button1_text = $slider->button1_text;
        $this->button1_url = $slider->button1_url;
        $this->button2_text = $slider->button2_text;
        $this->button2_url = $slider->button2_url;
        $this->order = $slider->order;
    }

    public function update(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'new_image' => ['nullable', 'image', 'max:2048'],
            'button1_text' => ['required', 'string', 'max:255'],
            'button1_url' => ['required', 'url', 'max:255'],
            'button2_text' => ['required', 'string', 'max:255'],
            'button2_url' => ['required', 'url', 'max:255'],
            'order' => ['required', 'integer'],
        ]);

        if ($this->new_image) {
            if ($this->slider->image) {
                Storage::disk('public')->delete($this->slider->image);
            }
            $validated['image'] = $this->new_image->store('sliders', 'public');
        } else {
            $validated['image'] = $this->slider->image;
        }
        
        unset($validated['new_image']);

        $this->slider->update($validated);

        $this->redirectRoute('admin.sliders.index', navigate: true);
    }
}; ?>

<div>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Admin / Sliders /</span> Modifier
    </h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Modifier le slider</h5>
        </div>
        <div class="card-body">
            <form wire:submit="update">
                <div class="mb-3">
                    <label class="form-label" for="title">Titre</label>
                    <input type="text" class="form-control" id="title" wire:model="title">
                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="subtitle">Sous-titre</label>
                    <input type="text" class="form-control" id="subtitle" wire:model="subtitle">
                    @error('subtitle') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="new_image" class="form-label">Nouvelle Image</label>
                    <input class="form-control" type="file" id="new_image" wire:model="new_image">
                    @error('new_image') <div class="text-danger">{{ $message }}</div> @enderror

                    <div class="mt-3">
                        @if ($new_image)
                            <span class="d-block mb-2">Aperçu de la nouvelle image :</span>
                            <img src="{{ $new_image->temporaryUrl() }}" class="img-fluid rounded" style="max-width: 200px;">
                        @elseif ($slider->image)
                             <span class="d-block mb-2">Image actuelle :</span>
                            <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid rounded" style="max-width: 200px;">
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button1_text">Texte Bouton 1</label>
                            <input type="text" class="form-control" id="button1_text" wire:model="button1_text">
                            @error('button1_text') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button1_url">URL Bouton 1</label>
                            <input type="text" class="form-control" id="button1_url" wire:model="button1_url">
                            @error('button1_url') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button2_text">Texte Bouton 2</label>
                            <input type="text" class="form-control" id="button2_text" wire:model="button2_text">
                            @error('button2_text') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="button2_url">URL Bouton 2</label>
                            <input type="text" class="form-control" id="button2_url" wire:model="button2_url">
                            @error('button2_url') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="order">Ordre</label>
                    <input type="number" class="form-control" id="order" wire:model="order">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Mettre à jour</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Mise à jour...
                    </span>
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary" wire:navigate>Annuler</a>
            </form>
        </div>
    </div>
</div>