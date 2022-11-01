@extends('layouts.app')

@section('pageTitle', 'Inicia Sesión en DevStagram')

@section('content')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="p-5 md:w-6/12">
      <img src="{{ asset('img/login.jpg') }}" alt="Imagen para el inicio de sesión">
    </div>

    <div class="p-6 bg-white rounded-lg shadow-lg md:w-4/12">
      <form method="POST" action="{{route('login')}}">
        @csrf

        @if(session('message'))
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ session('message') }}</p>
        @endif

        <div class="mb-5">
          <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">Correo electrónico</label>
          <input type="email" name="email" id="email" placeholder="correo@correo.com" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
          @error('email')
            <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">Contraseña</label>
          <input type="password" name="password" id="password" placeholder="Tu Contraseña" class="w-full p-3 border rounded-lg @error('password') border-red-500 @enderror">
          @error('password')
            <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <input type="checkbox" name="remember" id="remember" class="mr-2">
          <label for="remember" class="font-bold text-gray-500">Mantener mi sesión abierta</label>
        </div>

        <input type="submit" value="Iniciar Sesión" class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600">
      </form>
    </div>
  </div>
@endsection
