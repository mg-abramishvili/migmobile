<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class FileController extends Controller
{
    public function store(Request $request)
    {
        if (request()->file('gallery')) {
            $file = request()->file('gallery');
            $filename = time().'.'.$file->extension();

            if (!file_exists(public_path() . '/uploads/news/')) {
                mkdir(public_path() . '/uploads/news/', 0755, true);
            }

            $img = Image::make($file->path());
            $img->resize(600, 600, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/uploads/news/' . $filename);

            return \Response::make('/uploads/news/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }
    }
}