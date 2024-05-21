<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Http;

class ReviewController extends Controller
{
   public function store(Request $request)
   {
    $request->validate([
        'movie_id' => 'required|integer',
        'review' => 'required|string',
    ]);

    Review::create([
        'user_id'  => Auth::id(),
        'movie_id' => $request->movie_id,
        'review' => $request->review,
    ]);

        return redirect()->route('movie.index')
        ->with('success', 'レビューが作成されました');
   

   }

   //レビューの全件取得
   public function index()
   {

   
    $reviews = Review::with('user')->latest()->paginate(5);

    // dd($reviews);

    $movies = [];

    foreach($reviews as $review) {
        $movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
        ->get('https://api.themoviedb.org/3/movie/' . $review->movie_id . '?append_to_response=credits,images,videos')
        ->json();
        $movies[$review->movie_id] = $movie;

        // return view('reviews.index', compact('reviews', 'movies'));
    }








    // dd($reviews);
    return view('reviews.index', compact('reviews', 'movies'));
    // return view('movie.create');
   }


   public function create(Request $request)
   {


     $user = Auth::user();

     $movieId = $request->input('movie_id');

    // $movieId = $request->input('movie_id');
    $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
    ->get('https://api.themoviedb.org/3/movie/'.$movieId .'?append_to_response=credits,image,videos');

    if ($response->failed()) {
        return redirect()->back()->with('error', '映画情報の取得に失敗しました。');
    }

    $movie = $response->json();

    return view('reviews.create', compact('movie', 'user'));
   }

   public function show($id)
   {
    $movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
    ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,images,videos')
    ->json();

    $reviews = Review::where('movie_id', $id)->with('user')->latest()->take(3)->get();


    dd($reviews);
    return view('movie.show', [
        'movie' => $movie,
        'reviews' => $reviews,
    ]);
   }
//    public function show($id)
//    {
//     $reviews = Review::where('movie_id', $id)->get();

//     return view('')
//    }
}
