<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
  public function store(Request $request)
  {
    $image = $request->file('file');
    $image_name = Str::uuid() . '.' . $image->extension();
    $image_path = public_path('uploads') . '/' . $image_name;

    $image_server = Image::make($image);
    $image_server->fit(1000, 1000);
    $image_server->save($image_path);

    return response()->json(['image' => $image_name]);
  }
}
