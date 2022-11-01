<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DevStagram - @yield('pageTitle')</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
  <header class="p-5 bg-white border-b shadow">
    <div class="container flex items-center justify-between mx-auto">
      <h1 class="text-3xl font-black">DevStagram</h1>

      @auth
        <nav class="flex items-center gap-2">
          <a class="text-sm font-bold text-gray-600 uppercase" href="#">
            Hola: <span class="font-normal lowercase">{{ auth()->user()->username }}</span>
          </a>

          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-sm font-bold text-gray-600 uppercase" href="{{ route('logout') }}">
              Cerrar Sesión
            </button>
          </form>
        </nav>
      @endauth

      @guest
        <nav class="flex items-center gap-2">
          <a class="text-sm font-bold text-gray-600 uppercase" href="{{ route('login') }}">Login</a>
          <a class="text-sm font-bold text-gray-600 uppercase" href="{{ route('register') }}">Crear Cuenta</a>
        </nav>
      @endguest
    </div>
  </header>

  <main class="container mx-auto mt-10">
    <h2 class="mb-10 text-3xl font-black text-center">@yield('pageTitle')</h2>

    @yield('content')
  </main>

  <footer class="p-5 mt-10 font-bold text-center text-gray-500 uppercase">
    DevStagram - Todos los derechos reservados {{ date('Y') }}
  </footer>
</body>

</html>
