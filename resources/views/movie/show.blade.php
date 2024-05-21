@extends('layout.app')

@section('content')
   <div class="movie-info">
     @if(session('message'))
       <div class="alert alert-success text-center mt-6 mx-8 bg-sky-600 text-white font-semibold rounded py-2.5" id="flash-message">
         {{ session('message')}}
       </div>
     @endif
    <div class="container mx-auto px-4 pt-16 flex flex-col md:flex-row ">


      <!--ポスター写真-->
      <div class="flex-none">
        @if(isset($movie['poster_path']))
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                    @else
                        <img src="placeholder.jpg" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                    @endif
      </div>
      <div class="md:ml-24">
          <!--タイトル-->
          <h2 class="text-4xl font-semibold text-white">{{ $movie['original_title'] }}</h2>
          <div class="flex items-center text-gray-400 text-sm">
          <svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
               <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
          </svg>
          <!--評価-->
          <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
          <span class="mx-2">|</span> 
          <!--ジャンル -->
          <span>
            @foreach ($movie['genres'] as $genres)
              {{ $genres['name'] }} @if (!$loop->last), @endif
            @endforeach
          </span>
        </div>
        <!--詳細説明-->
        <!-- <span class="text-2xl mt-20 font-semibold text-white">
          {{ $movie['overview']}}
        </span>  -->

        

        <div class="mt-4 ">
          <h4 class="font-bold text-2xl text-white">作品紹介</h4>
          <p class="text-gray-100"> {{ $movie_context['overview']}} </p>
        </div>
        <div class="mt-4">
          <span class="font-bold text-xl text-white">上映時間 : {{ $movie['runtime'] }} 分</span>
        </div>

        <div class="mt-4">
         @auth 
           <form action="{{route('favorites.store')}}" style="display:inline;" method="POST">
           @csrf
           <input type="hidden" name="movie_id" value="{{ $movie['id'] }}" method="POST">
           <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">お気に入りに追加</button>
          </form>


          <form action="{{ route('favorites.destroy', $movie['id']) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">お気に入りから削除</button>
        </form>
        @endauth

        </div>

        <div class="mt-12">
          <div class="flex mt-4">
             @foreach  ($movie['credits']['crew'] as $crew)
                @if ($loop->index < 3)
                  <div class="mr-12">
                     <div class="text-white font-semibold">{{ $crew['name'] }}</div>
                     <div class="text-white font-semibold">{{ $crew['job'] }}</div>

                  </div>
                @endif 
              @endforeach
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>

 <div class="movie-cast">
  <div class="container mx-auto px-4 py-16">
    <h2 class="capitalize text-white text-2xl font-semibold">Top Billed Cast </h2>
    <div class="grid lg:grid-cols-7 gap-8">
      @foreach ($movie['credits']['cast'] as $cast)
        @if ($loop->index < 7)
        <div class="mt-8">
          <a href="#">
            <img src="{{'https://image.tmdb.org/t/p/w500/'. $cast['profile_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
          </a>
          <div class="mt-2">
            <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">{{ $cast['name']}} </a>
            <div class="text-sm text-gray-400">
              {{ $cast['character'] }}
            </div>
          </div>
        </div>
        @endif 
      @endforeach
    </div>
  </div>
 </div>

 @if (isset($movie['backdrops']))
 <div class="movie-image">
   <div class="container mx-auto px-4 py-16">
    <h2 class="container text-white text-2xl font-semibold">Image</h2>
    <div class="grid lg:grid-cols-7 gap-8">
      @foreach ($movie['backdrops'] as $image)
       @if ($loop->index < 8)
          <div class="mt-8">
            <a href="#">
              <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $image['file_path']}}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
            </a>
          </div>
       @endif
      @endforeach
    </div>
  </div>
</div>
@endif

<!--- レビューリスト -->
 @if (isset($reviews) && $reviews->isNotEmpty())
  <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">レビューリスト</h1>
    </div>
    <div class="flex flex-wrap -m-4"> 
       @foreach($reviews as $review)
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
          <div class="flex items-center mb-3">
            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
            <h2 class="text-gray-900 text-lg title-font font-medium">{{ $review->user->name }}</h2>
          </div>
          <div class="flex-grow">
            <p class="leading-relaxed text-base">{{ $review->review}}</p>
            <p class="leading-relaxed text-base">{{ $review->created_at }}</p>
          </div>
        </div>
      </div>
        @endforeach
     </div>
    </div>
  </section>
  @endif
  <div class="text-center mt-4 mb-6">
    @auth 
    <form action="{{ route('reviews.create') }}" method="GET">
      <input type="hidden" name="movie_id" value="{{ $movie['id'] }}">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">レビューを作成する</button>
    </form>
    @endauth
  </div>
@endsection


@section('scripts')
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // フラッシュメッセージを取得
        var flashMessage = document.getElementById('flash-message');
        // フラッシュメッセージが存在する場合
        if (flashMessage) {
            // 3秒後にメッセージをフェードアウトして削除
            setTimeout(function() {
                flashMessage.style.transition = 'opacity 0.5s ease-out';
                flashMessage.style.opacity = '0';
                setTimeout(function() {
                    flashMessage.remove();
                }, 3000); // 1秒（フェードアウトの時間）後に完全に削除
            }, 1000); // 3秒後にフェードアウト開始
        }
    });

 </script>