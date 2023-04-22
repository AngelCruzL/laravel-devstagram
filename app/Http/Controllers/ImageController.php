<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
  public function store(Request $request)
  {
    $input = $request->file('file');
    return response()->json(['image' => $input->extension()]);
  }
}
