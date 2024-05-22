@extends('layout.app')

@section('content')

<div class="py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-6 flex items-end justify-between gap-4">

      <h2 class="text-2xl font-bold font-semibold text-white lg:text-3xl sm:text-l">{{ $user-> name}} のお気に入り登録映画一覧</h2>

      </div>
  </div>
</div>

<div class="container mx-auto px-4 pt-16">
    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-8">
    @if(isset($movies))
        @if(count($movies) > 0)
           
                @foreach($movies as $movie)
                
                <div class="mt-8 relative">
                <a href="{{ route('movie.show', $movie['id'] ) }}">
                  <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                </a>
                <span class="ml-3 mt-3 border-2 border-yellow-500 rounded-full w-8 h-8 text-center absolute top-0 left-0 text-white font-semibold text-sm  flex justify-center items-center">
                  {{ $movie['vote_average'] * 10}} <small class="text-xs">%</small>
                </span>
                <div class="mt-2">
                  <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500"> {{ $movie['original_title'] }}</a>
                  <div class="flex items-center text-gray-400 text-sm"> 
                      <span>{{ $movie['release_date']}}</span>
                  </div>
                </div>
            </div>
                @endforeach
                
                @else
                <p class="mx-auto text-center font-semibold text-white">No results found.</p>
                @endif
            @endif
            </div>
        </div>





@endsection