<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
        ]);

        $favorite = Favorite::create([
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
         
        ]);

        return redirect()->back()->with('message','映画をお気に入りに追加しました');

        //    エラーログの確認
        // \Log::info('Favorite added: ', [
        //     'user_id' => Auth::id(),
        //     'movie_id' => $request->movie_id,
        // ]);
    }

    public function destroy($id)
    {

        $favorite = Favorite::where('user_id', Auth::id())->where('movie_id', $id)->first();

        
        if ($favorite){
            $favorite->delete();
            return redirect()->back()->with('message', 'お気に入りを削除しました');
        }

        return redirect()->back()->with('message', 'お気に入りが見つかりません');
    }
}
