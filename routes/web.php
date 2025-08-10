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

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Volt::route('dashboard', 'admin.dashboard')->name('dashboard');

    // Posts
    Volt::route('posts', 'admin.posts.index')->name('posts.index');
    Volt::route('posts/create', 'admin.posts.create')->name('posts.create');
    Volt::route('posts/{post}/edit', 'admin.posts.edit')->name('posts.edit');

    // Team Members
    Volt::route('team-members', 'admin.team-members.index')->name('team-members.index');
    Volt::route('team-members/create', 'admin.team-members.create')->name('team-members.create');
    Volt::route('team-members/{teamMember}/edit', 'admin.team-members.edit')->name('team-members.edit');

    // Achievements
    Volt::route('achievements', 'admin.achievements.index')->name('achievements.index');
    Volt::route('achievements/create', 'admin.achievements.create')->name('achievements.create');
    Volt::route('achievements/{achievement}/edit', 'admin.achievements.edit')->name('achievements.edit');

    // Sliders
    Volt::route('sliders', 'admin.sliders.index')->name('sliders.index');
    Volt::route('sliders/create', 'admin.sliders.create')->name('sliders.create');
    Volt::route('sliders/{slider}/edit', 'admin.sliders.edit')->name('sliders.edit');

    // Partners
    Volt::route('partners', 'admin.partners.index')->name('partners.index');
    Volt::route('partners/create', 'admin.partners.create')->name('partners.create');
    Volt::route('partners/{partner}/edit', 'admin.partners.edit')->name('partners.edit');

    // Features
    Volt::route('features', 'admin.features.index')->name('features.index');
    Volt::route('features/create', 'admin.features.create')->name('features.create');
    Volt::route('features/{feature}/edit', 'admin.features.edit')->name('features.edit');

    // Testimonials
    Volt::route('testimonials', 'admin.testimonials.index')->name('testimonials.index');
    Volt::route('testimonials/create', 'admin.testimonials.create')->name('testimonials.create');
    Volt::route('testimonials/{testimonial}/edit', 'admin.testimonials.edit')->name('testimonials.edit');

    // About Page
    Volt::route('about/edit', 'admin.about.edit')->name('about.edit');

    // Settings
    Route::get('settings', \App\Livewire\SettingsManager::class)->name('settings');
});

