<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    // お気に入り追加機能
    public function addFavorite(Request $request,$id)
    {
        $user = Auth::user();
        $item = Item::find($id);
        Favorite::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);
// ここまで機能OK

        $userId = Auth::user()->id;
        $favorites =  Favorite::where('user_id',$userId)->get();
        $categories = $item->itemCategories()->with('category')->get();
        
        // マイリスト登録数をカウント
        $favoriteCount = Favorite::where('item_id', $item->id)->count();

        return view('item_detail', compact('item','favorites','categories','favoriteCount'));
    }

    // お気に入り削除機能
    public function deleteFavorite($id)
    {
        $favorite = Favorite::find($id)->delete();
        $user = Auth::user();
        $favorites = Favorite::where('user_id',$user->id)
        ->get();
        $categories = $item->itemCategories()->with('category')->get();
        return view('shop_all',compact('categories','favorites','item'));
    }
}
