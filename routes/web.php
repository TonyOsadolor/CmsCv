<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicImageController;
use App\Livewire\Livewire\V1\LandPageComponent;

// Access Public Images
Route::get('/public/assets/img/{filename}', [PublicImageController::class, 'getImage']);

// Landing Page
Route::get('/', LandPageComponent::class);
