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

  public function store(Request $request): View|RedirectResponse
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
      ],
      'email' => [
        Rule::unique('users', 'email')->ignore(auth()->user()),
      ],
      'password' => 'nullable|confirmed|min:6',
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
    $user->email = $request->email ?? auth()->user()->email;
    $user->password = $request->password ?? auth()->user()->password;
    $user->has_changed_password = $request->password ? true : false;

    if ($request->email || $request->password) {
      return view('profile.confirm-change', [
        'user' => $user,
      ]);
    }
    unset($user->has_changed_password);
    $user->save();

    return redirect()->route('posts.index', $user->username);
  }
}
