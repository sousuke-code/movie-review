@extends('layout.app')

@section('content')


<form class="mt-10 mx-auto w-full max-w-sm" action="{{ route('movie.reserch') }}" method="GET">
  <div class="flex items-center border-b border-indigo-500 py-2">
    <input class="text-center appearance-none font-semibold  bg-transparent border-none w-full text-white mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="query" placeholder="映画名を入力してください" aria-label="Full name" value="{{ old('query', $query) }}" >
    <button class="flex-shrink-0 bg-indigo-500 hover:bg-indigo-700 border-indigo-500 hover:border-indigo-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
      検索する
    </button>
  </div>
</form>
   

    <div class="container mx-auto px-4 pt-16">
    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-8">
    @if(isset($allMovie))
        @if(count($allMovie) > 0)
            @foreach($allMovie as $movie)
              @if (['movie_path'] !== '')
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
               @endif
                @endforeach
                
              </div>
            </div>
            @else
            <div class="flex items-center">
              <p class="font-semibold text-white">検索結果が見つかりません</p>
            </div>
            @endif
        @endif
            
@endsection