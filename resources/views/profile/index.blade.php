@extends('layouts.app')

@section('pageTitle', 'Editar perfil ' . auth()->user()->username)

@section('content')
  <div class='md:flex md:justify-center'>
    <div class='p-6 bg-white shadow | md:w-1/2'>
      <form class='mt-10 | md:mt-0' action=''>
        <div class='mb-5'>
          <label for='username' class='block mb-2 text-gray-500 font-bold uppercase'>
            Username
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
          <label for='profile_image' class='block mb-2 text-gray-500 font-bold uppercase'>
            Imagen de Perfil
          </label>

          <input
            type='file'
            id='profile_image'
            name='profile_image'
            class="p-3 border w-full rounded-lg"
            value=''
            accept='.jpg, .jpeg, .png'
          >

          @error('username')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
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
