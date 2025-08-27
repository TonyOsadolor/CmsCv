<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PublicImageController extends Controller
{
    /**
     * Get Public Images
     */
    public function getImage(string $fileName)
    {
        $path = storage_path('app/public/assets/img/' . $fileName);

        if (!file_exists($path)) {
            abort(404);
        }

        $mimeType = mime_content_type($path);
        return response()->file($path, ['Content-Type' => $mimeType]);
    }
}
