<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

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

  public function store(Request $request): void
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
  }
}
