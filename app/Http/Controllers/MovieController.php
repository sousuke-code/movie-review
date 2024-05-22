<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use Illuminate\Http\Controllers\Auth; 
use Illuminate\Support\Facades\Auth;
use App\Models\Review;


class MovieController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $popularMovie  = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $upcomingmovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        ->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];


        // dump($popularMovie);
        return view('movie.index', [
            'popularMovie' => $popularMovie,
            'upcomingMovie' => $upcomingmovie
        ]);
    }

    //映画情報の検索
    public function serch()
    {
        $allMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        ->get('https://api.themoviedb.org/3/movie/')
        ->json()['results'];

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    //映画の詳細表示
    public function show(string $id)
    {

        // $apiKey = env('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg');

        // $movie = Http::get("https://api.themoviedb.org/3/movie/{$id}", [
        //     'api_key' => $apiKey,
        //     'language' => 'ja-JP',
        // ]);
        $movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,image,videos')
        ->json();

        $movie_context = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,image,videos', [
         'language' => 'ja-JP',
        ])
        ->json();



        $jobTranslations = [
            'Director' => '監督',
            'Writer' => '脚本家',
            'Producer' => 'プロデューサー',
        ];

        foreach ($movie['credits']['crew'] as &$crew) {
            $crew['job'] = $jobTranslations[$crew['job']] ?? $crew['job'];
        }

        $reviews = Review::where('movie_id', $id)->with('user')->latest()->take(3)->get();

        // $reviews = Review::where('movie_id', $id)->get();

        // dump($movie);
        return view('movie.show', [
            'movie' => $movie,
            'movie_context' => $movie_context,
            'reviews' => $reviews,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reserch(Request $request)
    {
        // $allMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        // ->get('')
        // ->json()['results'];

        // dump($allMovie);
        $query = $request->input('query');
        $allMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        ->get('https://api.themoviedb.org/3/search/movie', [
            'query' => $query,
        ])
        ->json()['results'];

      

        return view('movie.reserch', compact('allMovie', 'query',));
    }

    public function myPage(){
        $user = Auth::user();
        $favorites = $user->favorites()->get();
        $movies = [];

        foreach ($favorites as $favorite){
            $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
                ->get('https://api.themoviedb.org/3/movie/' . $favorite->movie_id . '?append_to_response=credits,image,videos');
    
            if($response->successful()){
                $movie = $response->json();
                $movies[] = $movie;
            }

            // if($response->successful()){
            //     $movie = $response->json();
            //     $movies[] = $movie;
            // }
        }

        // dd($movies);

        return view('movie.mypage', compact('movies','user'));

    }

    // public function storeReview(Request $request, $id)
    // {
    //     $request->validate([
    //         'content' => 'required',
    //     ]);

    //     Review::create([
    //         'movie_id' => $id,
    //         'user_id' => Auth::id(), //ログインユーザーのIDを設定
    //         'author' => $request->input('author'),
    //         'content' => $request->input('content'),
    //     ]);

    //     return redirect()->route('movies.show', $id)->with('success', 'Review added successfully!');

    // }

    public function dashboard()
    {
        return redirect()->route('movie.index');
    }
}
