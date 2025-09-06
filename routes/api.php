<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Wrap Json Endpoints
Route::middleware(['json', 'autodeploy'])->group(function () {
    // Auto Deploy Endpoint
    Route::post(config('mine.auto_deploy_url'), function (){
        Artisan::call('optimize:clear');
        Artisan::call('migrate', ['--force' => true]);

        return response()->json([
            'status' => true,
            'message' => 'Deployment tasks executed',
        ], 200);
    });
});