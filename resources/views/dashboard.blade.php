@extends('layouts.app')

@section('pageTitle', 'Tu Cuenta')

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
      <div class="px-5 md:w-8/12 lg:w-6/12">
        <img src="{{asset('img/user.svg')}}" alt="User default image">
      </div>

      <div class="px-5 md:w-8/12 lg:w-6/12">
        <p class="text-2xl text-gray-700">{{ auth()->user()->name }}</p>
      </div>
    </div>
  </div>
@endsection
