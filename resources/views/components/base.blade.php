<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ConnectNest Wallet')</title>
    {{-- @vite('resources/css/app.css') --}}
     <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 

    @yield('head')

</head>


<body
    class="bg-gray-100 dark:bg-gray-900 font-sans leading-normal tracking-normal transition-colors duration-300 overflow-x-hidden">


    @include('components.preloader')

  
  


    <!-- Header -->
   @include('components.header')
  
    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>


  @include('components.bottom-nav')

  @include('components.support')


  <!--- footer--->
  @include('components.footer')

   
</body>

</html>
