<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LikeController extends Controller
{
  public function store(Request $request, Post $post): RedirectResponse
  {
    $post->likes()->create([
      'user_id' => $request->user()->id,
    ]);

    return back();
  }

  public function destroy(Request $request, Post $post): RedirectResponse
  {
    $request->user()->likes()->where('post_id', $post->id)->delete();

    return back();
  }
}
