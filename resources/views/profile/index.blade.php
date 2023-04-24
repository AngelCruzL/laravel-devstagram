@extends('layouts.app')

@section('pageTitle', 'Editar perfil ' . auth()->user()->username)

@section('content')
  <div class='md:flex md:justify-center'>
    <div class='p-6 bg-white shadow | md:w-1/2'>
      <form
        class='mt-10 | md:mt-0'
        action='{{ route('profile.store') }}'
        enctype='multipart/form-data'
        method='POST'
      >
        @csrf
        <div class='mb-5'>
          <label for='username' class='block mb-2 text-gray-500 font-bold uppercase'>
            Nombre de Usuario
          </label>
          <input
            type='text'
            id='username'
            name='username'
            placeholder='Nombre de usuario'
            class="p-3 border w-full rounded-lg @error('username') border-red-500 @enderror"
            value='{{ auth()->user()->username }}'
          >

          @error('username')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class='mb-5'>
          <label for='avatar' class='block mb-2 text-gray-500 font-bold uppercase'>
            Imagen de Perfil
          </label>

          <input
            type='file'
            id='avatar'
            name='avatar'
            class="p-3 border w-full rounded-lg"
            value=''
            accept='.jpg, .jpeg, .png'
          >
        </div>

        <div class="mb-5">
          <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">
            Correo electrónico
          </label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="correo@correo.com"
            class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
            value="{{ old('email') }}"
          >

          @error('email')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">
            Contraseña
          </label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Tu Contraseña"
            class="w-full p-3 border rounded-lg @error('password') border-red-500 @enderror"
          >

          @error('password')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label
            for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase">
            Confirmar Nueva Contraseña
          </label>
          <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="Repite tu Contraseña"
            class="w-full p-3 border rounded-lg"
          >
        </div>

        <input
          type="submit"
          value="Guardar cambios"
          class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600"
        >
      </form>
    </div>
  </div>
@endsection
