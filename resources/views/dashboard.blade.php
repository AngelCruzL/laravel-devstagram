@extends('layouts.app')

@section('pageTitle', $user->username)

@section('content')
  <div class="flex justify-center">
    <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
      <div class="w-8/12 px-5 lg:w-6/12">
        <img
          src="{{ $user->image ? asset('profile-pictures/' . $user->image) : asset('img/user.svg') }}"
          alt="User default image">
      </div>

      <div class="flex flex-col items-center px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:items-start md:py-10">
        <div class='flex items-center gap-2'>
          <p class="text-2xl text-gray-700">{{ $user->username }}</p>

          @auth
            @if($user->id === auth()->user()->id)
              <a
                href='{{ route('profile.index') }}'
                class='text-gray-500 hover:text-gray-600 cursor-pointer'
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24" fill="currentColor"
                  class="w-5 h-5"
                >
                  <path
                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"
                  />
                </svg>
              </a>
            @endif
          @endauth
        </div>

        <p class="mt-5 mb-3 text-sm font-bold to-gray-800">
          {{ $user->followers->count() }}
          <span class="font-normal">
            @choice('Seguidor|Seguidores', $user->followers->count())
          </span>
        </p>

        <p class="mb-3 text-sm font-bold to-gray-800">
          {{ $user->following->count() }}
          <span class="font-normal">Siguiendo</span>
        </p>

        <p class="mb-3 text-sm font-bold to-gray-800">
          {{ $user->posts->count() }}
          <span class="font-normal">Posts</span>
        </p>

        @auth
          @if($user->id!==auth()->user()->id)
            @if(!$user->is_follower(auth()->user()))
              <form
                action='{{ route('users.follow', $user) }}'
                method='POST'
              >
                @csrf
                <input
                  type="submit"
                  value="Seguir"
                  class='cursor-pointer py-1 px-3 rounded bg-blue-600 text-white text-xs uppercase font-bold'
                >
              </form>
            @else
              <form
                action='{{ route('users.unfollow', $user) }}'
                method='POST'
              >
                @csrf
                @method('DELETE')
                <input
                  type="submit"
                  value="Dejar de Seguir"
                  class='cursor-pointer py-1 px-3 rounded bg-red-600 text-white text-xs uppercase font-bold'
                >
              </form>
            @endif
          @endif
        @endauth
      </div>
    </div>
  </div>

  <section class='container mx-auto mt-10' aria-labelledby='posts_section'>
    <h2 id='posts_section' class='text-4xl text-center font-black my-10'>
      Publicaciones
    </h2>

    @if($posts->count())
      <div class='grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6'>
        @foreach($posts as $post)
          <div>
            <a href='{{ route('posts.show', ['post' => $post, 'user' => $user]) }}'>
              <img
                src='{{ asset("uploads") . "/" . $post->image }}'
                alt='Imagen del post {{ $post->title }}'
              >
            </a>
          </div>
        @endforeach
      </div>

      <div class='mt-10'>
        {{ $posts->links() }}
      </div>
    @else
      <p class='text-gray-600 uppercase text-sm text-center font-bold'>No hay publicaciones</p>
    @endif
  </section>
@endsection
