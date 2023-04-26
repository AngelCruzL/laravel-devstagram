@extends('layouts.app')

@section('pageTitle', 'DevStagram | A place to share your knowledge')

@section('content')
  <x-post-list :posts='$posts' />
@endsection
