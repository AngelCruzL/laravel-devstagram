@extends('layouts.app')

@section('pageTitle', 'DevStagram | A place to share your knowledge')

@section('content')
  @if($posts->count())
    <div class='grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6'>
      @foreach($posts as $post)
        <div>
          <a href='{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}'>
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
@endsection
