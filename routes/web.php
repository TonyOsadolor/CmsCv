<?php

use App\Http\Controllers\PublicImageController;
use App\Livewire\V1\TestimonialComponent;
use App\Livewire\V1\LandPageComponent;
use Illuminate\Support\Facades\Route;

// Access Public Images
Route::get('/public/assets/img/{filename}', [PublicImageController::class, 'getImage']);

// Landing Page
Route::get('/', LandPageComponent::class);

// Testimonials
Route::prefix('testimonials')->group(function () {
    Route::get('/', TestimonialComponent::class);
});
