@extends('components.base')

@section('hero-section')
  
@endsection


@section('content')


<div class="bg-gray-50 font-sans py-16">

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
       @include('components.hero')
        @include('components.cards')
        @include('components.recent-transactions')
        @include('components.stats')

     
    </main>

  

  
   


  
  




   @endsection
