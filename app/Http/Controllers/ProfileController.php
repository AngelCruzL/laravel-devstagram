<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(): View
  {
    return view('profile.index');
  }

  public function store(Request $request): RedirectResponse
  {
    $request->request->add([
      'username' => Str::slug($request->username),
    ]);

    $this->validate($request, [
      'username' => [
        'required',
        //  Enable the profile to be updated without changing the username
        Rule::unique('users', 'username')->ignore(auth()->user()),
        'min:3',
        'max:25',
        'not_in:twitter,editar-perfil'
      ]
    ]);

    if ($request->avatar) {
      $image = $request->file('avatar');
      $image_name = Str::uuid() . '.' . $image->extension();
      $image_path = public_path('profile-pictures') . '/' . $image_name;

      $image_server = Image::make($image);
      $image_server->fit(1000, 1000);
      $image_server->save($image_path);
    }

    //  Update the user's profile
    $user = User::find(auth()->user()->id);
    $user->username = $request->username;
    $user->image = $image_name ?? auth()->user()->image ?? null;
    $user->save();

    return redirect()->route('posts.index', $user->username);
  }
}
