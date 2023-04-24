@extends('layouts.app')

@section('pageTitle', $post->title)

@section('content')
  <div class='container mx-auto md:flex'>
    <div class='md:w-1/2'>
      <img
        src='{{ asset("uploads") . "/" . $post->image }}'
        alt='Imagen del post {{ $post->title }}'
      >

      <div class='p-3'>
        <p>0 Likes</p>
      </div>

      <div>
        <p class='font-bold'>{{ $post->user->username }}</p>

        <p class='text-sm text-gray-500'>
          {{ $post->created_at->diffForHumans() }}
        </p>

        <p class='mt-5'>{{ $post->description }}</p>
      </div>
    </div>

    <div class='md:w-1/2 p-5'>
      <div class='shadow bg-white p-5 mb-5'>
        @auth
          <p class='text-xl font-bold text-center mb-4'>
            Agrega un nuevo comentario
          </p>

          @if(session('message'))
            <p class='p-2 my-2 text-sm text-center text-white font-bold bg-green-500 rounded-lg'>
              {{ session('message') }}
            </p>
          @endif

          <form
            action='{{ route('comments.store', ['post' => $post, 'user' => $user]) }}'
            method='POST'
          >
            @csrf
            <div class="mb-5">
              <label for="comment" class="block mb-2 font-bold text-gray-500 uppercase sr-only">
                Agrega un comentario
              </label>

              <textarea
                name="comment"
                id="comment"
                placeholder="Agrega un comentario a la publicación"
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
              ></textarea>

              @error('comment')
              <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
              @enderror
            </div>

            <input
              type="submit"
              value="Comentar"
              class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600"
            >
          </form>
        @endauth
      </div>
    </div>
  </div>
@endsection
