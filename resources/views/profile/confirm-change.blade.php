@extends('layouts.app')

@section('pageTitle', 'Confirmar cambio de correo electrónico y/o contraseña')

@section('content')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <form action="{{  }}" method="POST">
      @csrf
      <div class="mb-5">
        <label for="old_password" class="block mb-2 font-bold text-gray-500 uppercase">
          Confirma tu contraseña actual
        </label>
        <input
          type="password"
          name="old_password"
          id="old_password"
          placeholder="Tu Contraseña"
          class="border p-3 w-full rounded-lg @error('old_password') border-red-500 @enderror"
          required
        >

        @error('old_password')
        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
        @enderror
      </div>

      @if($user->has_changed_password)
        <input type="hidden" name="new_password" value='{{ $user->password }}'>
      @endif

      <input
        type="submit"
        value="Crear Cuenta"
        class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600"
      >
    </form>
  </div>
@endsection
