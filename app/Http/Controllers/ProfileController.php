<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use App\Models\Review;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show($id)
    {
        //ユーザ情報の取得
        $user = User::findOrFail($id);

        //各ユーザが登録しているお気に入り映画の表示

        // $reviews = Review::with('user')->where('user_id', $id)->get();

        $favorites  = $user->favorites()->get();
        $movies = [];

        foreach ($favorites as $favorite){
            $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYWM5NDljYzY4Y2Q4YmQ4ZDYxMTBiMzJiZjk5MWNkMCIsInN1YiI6IjY2NDE2M2NjYTU4MjQyNmZiZTAxNmUzNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.UgsYuOWABbPG9_FPTfMyNScwKzGe0Zn_ymeclhm0YVg')
                ->get('https://api.themoviedb.org/3/movie/' . $favorite->movie_id . '?append_to_response=credits,image,videos');
    
            if($response->successful()){
                $movie = $response->json();
                $movies[] = $movie;
            }
        }

        
        return view('users.index', compact('user', 'movies'));
    }
    

}
