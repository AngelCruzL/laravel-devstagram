<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login');
  }

  public function store()
  {
    $this->validate(request(), [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (!auth()->attempt(request(['email', 'password']))) {
      return back()->with('message', 'Credenciales incorrectas');
    }

    return redirect()->route('post.index');
  }
}
