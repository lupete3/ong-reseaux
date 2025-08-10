<?php

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public string $delete_password = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'delete_password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
};
?>

@section('title', 'Profil')

<section>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Comptes /</span> Profil
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#profile-tab"><i class="bx bx-user me-1"></i> Informations du Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#security-tab"><i class="bx bx-lock-alt me-1"></i> Sécurité</a>
                </li>
            </ul>
            <div class="card mb-4">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profile-tab" role="tabpanel">
                        <h5 class="card-header">Détails du Profil</h5>
                        <div class="card-body">
                            <form wire:submit="updateProfileInformation">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">{{
 __('Nom') }}
                                        </label>
                                        <input type="text" id="name" wire:model="name" class="form-control" placeholder="John Doe" required autofocus autocomplete="name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">{{
 __('Email') }}
                                        </label>
                                        <input type="email" id="email" wire:model="email" class="form-control" placeholder="email@example.com" required autocomplete="email">
                                    </div>
                                </div>

                                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                                    <div class="mt-3">
                                        <p class="text-warning">
                                            {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}
                                            <a href="#" wire:click.prevent="resendVerificationNotification" class="text-info">{{
 __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                                            </a>
                                            <span wire:loading wire:target="resendVerificationNotification" class="text-muted">{{
 __('Envoi en cours...') }}
                                            </span>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 text-success">
                                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2" wire:loading.attr="disabled">
                                        <span wire:loading.remove>{{ __('Enregistrer les modifications') }}</span>
                                        <span wire:loading>
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            {{ __('Enregistrement...') }}
                                        </span>
                                    </button>
                                    <x-action-message class="me-3" on="profile-updated">
                                        {{ __('Enregistré.') }}
                                    </x-action-message>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="security-tab" role="tabpanel">
                        <h5 class="card-header">Sécurité</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-3">Changer le mot de passe</h6>
                                    <form wire:submit="updatePassword">
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">{{
 __('Mot de passe actuel') }}
                                            </label>
                                            <input type="password" id="current_password" wire:model="current_password" class="form-control" required autocomplete="current-password" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{
 __('Nouveau mot de passe') }}
                                            </label>
                                            <input type="password" id="password" wire:model="password" class="form-control" required autocomplete="new-password" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">{{
 __('Confirmer le mot de passe') }}
                                            </label>
                                            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="form-control" required autocomplete="new-password" />
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2" wire:loading.attr="disabled">
                                                <span wire:loading.remove>{{ __('Enregistrer') }}</span>
                                                <span wire:loading>
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    {{ __('Enregistrement...') }}
                                                </span>
                                            </button>
                                            <x-action-message class="me-3" on="password-updated">
                                                {{ __('Enregistré.') }}
                                            </x-action-message>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-3">Supprimer le compte</h6>
                                    <p>{{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.') }}</p>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                        {{ __('Supprimer le compte') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">{{
 __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}</p>

                    <form wire:submit="deleteUser" class="space-y-3">
                        <div class="mb-3">
                            <label for="delete_password" class="form-label">{{
 __('Mot de passe') }}
                            </label>
                            <input type="password" id="delete_password" wire:model="delete_password" class="form-control" required />
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{
 __('Annuler') }}
                            </button>
                            <button type="submit" class="btn btn-danger" wire:loading.attr="disabled">
                                <span wire:loading.remove>{{ __('Supprimer le compte') }}</span>
                                <span wire:loading>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ __('Suppression...') }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>