<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($filename)
    {
        $path = storage_path('app/public/' . $filename);
         dd($path);

        if (!Storage::exists('public/' . $filename)) {
            abort(404);
        }

        $file = Storage::get('public/' . $filename);
        $type = Storage::mimeType('public/' . $filename);

        $response = response($file, 200)->header('Content-Type', $type);

        return $response;
    }
}
