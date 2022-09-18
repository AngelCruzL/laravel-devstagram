@extends('layouts.app')

@section('pageTitle', 'Registrate en DevStagram')

@section('content')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/register.jpg') }}" alt="Imagen para el registro de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
      <form action="">
        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
          <input type="text" name="name" id="name" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg">
        </div>

        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
          <input type="text" name="username" id="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg">
        </div>

        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo electrónico</label>
          <input type="email" name="email" id="email" placeholder="correo@correo.com" class="border p-3 w-full rounded-lg">
        </div>

        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
          <input type="password" name="password" id="password" placeholder="Tu Contraseña" class="border p-3 w-full rounded-lg">
        </div>

        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar Contraseña</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu Contraseña" class="border p-3 w-full rounded-lg">
        </div>

        <input type="submit" value="Crear Cuenta" class="bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
      </form>
    </div>
  </div>
@endsection