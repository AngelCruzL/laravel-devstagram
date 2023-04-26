@extends('layouts.app')

@section('pageTitle', $post->title)

@section('content')
  <div class='container mx-auto md:flex'>
    <div class='md:w-1/2'>
      <img
        src='{{ asset("uploads") . "/" . $post->image }}'
        alt='Imagen del post {{ $post->title }}'
      >

      <div class='p-3 flex items-center gap-2'>
        @auth
          <livewire:post-like :post='$post' />

          @if($post->check_like(auth()->user()))
            <form action='{{ route('posts.likes.destroy', $post) }}' method='POST'>
              @method('DELETE')
              @csrf
              <div class='my-4'>
                <button type="submit">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="red"
                    viewBox="0 0 24 18"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
                </button>
              </div>
            </form>
          @else
            <form action='{{ route('posts.likes.store', $post) }}' method='POST'>
              @csrf
              <div class='my-4'>
                <button type="submit">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 18"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
                </button>
              </div>
            </form>
          @endif
        @endauth

        <p class='font-bold'>{{ $post->likes->count() }}
          <span class='font-normal'>Likes</span>
        </p>
      </div>

      <div>
        <p class='font-bold'>{{ $post->user->username }}</p>

        <p class='text-sm text-gray-500'>
          {{ $post->created_at->diffForHumans() }}
        </p>

        <p class='mt-5'>{{ $post->description }}</p>
      </div>

      @auth
        @if($post->user_id === auth()->user()->id)
          <form action='{{ route("posts.destroy", $post) }}' method='POST'>
            @method('DELETE')
            @csrf
            <input
              type="submit"
              value="Eliminar publicación"
              class='bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer'
            >
          </form>
        @endif
      @endauth
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

        <div class='bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10'>
          @if($post->comments->count())
            @foreach($post->comments as $comment)
              <div class='p-5 border-gray-300 border-b'>
                <a href='{{ route("posts.index", $comment->user) }}' class='font-bold'>
                  {{ $comment->user->username }}
                </a>

                <p>{{ $comment->comment }}</p>
                <p class='text-sm text-gray-500'>
                  {{ $comment->created_at->diffForHumans() }}
                </p>
              </div>
            @endforeach
          @else
            <p class='p-10 text-center'>No hay comentarios aún</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
