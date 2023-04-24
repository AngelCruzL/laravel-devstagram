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
    $this->middleware('auth')->except(['index', 'show']);
  }

  public function index(User $user): View
  {
    $posts = Post::where('user_id', $user->id)->paginate(20);

    return view('dashboard', [
      'user' => $user,
      'posts' => $posts,
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
    //    $post = new Post();
    //    $post->title = $request->title;
    //    $post->description = $request->description;
    //    $post->image = $request->image;
    //    $post->user_id = auth()->user()->id;
    //    $post->save();

    //    Another way to do it including relationships:
    $request->user()->posts()->create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => $request->image,
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->route('posts.index', auth()->user()->username);
  }

  public function create(): View
  {
    return view('posts.create');
  }

  public function show(User $user, Post $post): View
  {
    return view('posts.show', [
      'post' => $post,
      'user' => $user,
    ]);
  }

  public function destroy(Post $post)
  {
    $this->authorize('delete', $post);
    $post->delete();

    return redirect()->route('posts.index', auth()->user()->username);
  }
}
