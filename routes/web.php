<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

// Section Pages
Route::get('/about', \App\Livewire\AboutPage::class)->name('about');
Route::get('/features', \App\Livewire\FeaturesPage::class)->name('features');
Route::get('/achievements', \App\Livewire\AchievementsPage::class)->name('achievements');
Route::get('/team', \App\Livewire\TeamPage::class)->name('team');
Route::get('/blog', \App\Livewire\PostsPage::class)->name('blog');
Route::get('/contact', \App\Livewire\ContactPage::class)->name('contact');


// Detail Pages
Route::get('/blog/{id}', \App\Livewire\BlogDetail::class)->name('blog.detail');
Route::get('/achievements/{id}', \App\Livewire\AchievementDetail::class)->name('achievement.detail');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});

require __DIR__.'/auth.php';
