@extends('layouts.app')

@section('pageTitle', $user->username)

@section('content')
  <div class="flex justify-center">
    <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
      <div class="w-8/12 px-5 lg:w-6/12">
        <img src="{{asset('img/user.svg')}}" alt="User default image">
      </div>

      <div class="flex flex-col items-center px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:items-start md:py-10">
        <p class="text-2xl text-gray-700">{{ $user->username }}</p>

        <p class="mt-5 mb-3 text-sm font-bold to-gray-800">
          0
          <span class="font-normal">Seguidores</span>
        </p>

        <p class="mb-3 text-sm font-bold to-gray-800">
          0
          <span class="font-normal">Siguiendo</span>
        </p>

        <p class="mb-3 text-sm font-bold to-gray-800">
          0
          <span class="font-normal">Posts</span>
        </p>
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
            <a>
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
