<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(User $user): View
  {
    return view('dashboard', [
      'user' => $user,
    ]);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|max:255',
      'description' => 'required',
      'image' => 'required',
    ]);

//    Post::create([
//      'title' => $request->title,
//      'description' => $request->description,
//      'image' => $request->image,
//      'user_id' => auth()->user()->id,
//    ]);

//    Other way to do it:
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->image = $request->image;
    $post->user_id = auth()->user()->id;
    $post->save();

    return redirect()->route('posts.index', auth()->user()->username);
  }

  public function create(): View
  {
    return view('posts.create');
  }
}
