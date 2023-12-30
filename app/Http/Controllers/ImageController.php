<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($filename)
    {
        $path = storage_path('app/' . $filename);
         dd($path);

        if (!Storage::exists('/' . $filename)) {
            abort(404);
        }

        $file = Storage::get('/' . $filename);
        $type = Storage::mimeType('/' . $filename);

        $response = response($file, 200)->header('Content-Type', $type);

        return $response;
    }
}
