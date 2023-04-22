@extends('layouts.app')

@section('pageTitle', 'Crear una nueva publicación')

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class='md:flex md:items-center'>
    <div class='md:w-1/2 px-10'>
      <form
        action='{{ route('images.store') }}'
        method='POST'
        enctype='multipart/form-data'
        id='dropzone'
        class='dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center'
      >
        @csrf
      </form>
    </div>

    <div class='md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0'>
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="title" class="block mb-2 font-bold text-gray-500 uppercase">Título</label>
          <input
            type="text"
            name="title"
            id="title"
            placeholder="Título de la publicación"
            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
            value="{{ old('title') }}"
          >

          @error('title')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="description" class="block mb-2 font-bold text-gray-500 uppercase">Descripción</label>
          <textarea
            name="description"
            id="description"
            placeholder="Descripción de la publicación"
            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
          >{{ old('description') }}</textarea>

          @error('description')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <div class='mb-5'>
          <input type='hidden' name='image' value='{{ old('image') }}'>

          @error('image')
          <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
          @enderror
        </div>

        <input
          type="submit"
          value="Crear publicación"
          class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600"
        >
      </form>
    </div>
  </div>
@endsection
