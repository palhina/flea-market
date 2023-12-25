<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Item;
use App\Models\Favorite;
use App\Models\Comment;

class FavoriteController extends Controller
{
    // お気に入り追加機能
    public function addFavorite(Request $request,$id)
    {
        $user = Auth::user();
        $userId = Auth::user()->id;
        $item = Item::find($id);
        Favorite::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);

        $categories = $item->itemCategories()->with('category')->get();
        $item->isFavorite = Favorite::isFavorite($item->id, $userId)->exists();
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $commentCount = Comment::where('item_id', $item->id)->count();

        return view('item_detail', compact('item','categories','favoriteCount','commentCount'));
    }

    // お気に入り削除機能
    public function deleteFavorite($id)
    {
        $item = Item::find($id);
        $user = Auth::user();
        $userId = Auth::user()->id;
        $favorite = Favorite::where('item_id', $id)
            ->where('user_id', $userId)
            ->delete();

        $categories = $item->itemCategories()->with('category')->get();
        $item->isFavorite = Favorite::isFavorite($item->id, $userId)->exists();
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $commentCount = Comment::where('item_id', $item->id)->count();
        return view('item_detail',compact('categories','favorite','item','favoriteCount','commentCount'));
    }
}
