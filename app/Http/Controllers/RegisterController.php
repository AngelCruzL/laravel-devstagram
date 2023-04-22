<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    $request->request->add([
      'username' => Str::slug($request->username),
    ]);

    $this->validate($request, [
      'name' => 'required|max:30|min:3',
      'username' => 'required|unique:users|min:3|max:25',
      'email' => 'required|email|max:60|unique:users',
      'password' => 'required|confirmed|min:6',
    ]);

    User::create([
      'name' => $request->name,
      'username' => $request->username,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    auth()->attempt($request->only('email', 'password'));

    return redirect()->route('posts.index', auth()->user()->username);
  }
}
