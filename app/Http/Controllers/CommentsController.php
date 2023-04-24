<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
  public function store(Request $request, User $user, Post $post): RedirectResponse
  {
    $this->validate($request, [
      'comment' => 'required|max:255',
    ]);

    Comments::create([
      'comment' => $request->comment,
      'user_id' => auth()->user()->id,
      'post_id' => $post->id,
    ]);

    return back()->with('message', 'Comentario realizado exitosamente');
  }
}
