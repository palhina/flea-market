<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    // コメントページ表示
    public function comment($id)
    {
        $user = Auth::user();
        $item = Item::find($id);
        $item->isFavorite = Favorite::isFavorite($item->id, $user->id)->exists();

        $categories = $item->itemCategories()->with('category')->get();
        $favoriteCount = Favorite::where('item_id', $item->id)->count();       
        $comments = Comment::where('item_id', $item->id)->with('user')->get();
        $commentCount = $comments->count();

        return view('comment', compact('item','categories','favoriteCount','commentCount','comments'));
    }

    // コメント送信機能
    public function commentTo(CommentRequest $request,$id)
    {
        $user = Auth::user();
        $item = Item::find($id);
        Comment::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => $request->input('comment'),
        ]);

        $item->isFavorite = Favorite::isFavorite($item->id, $user->id)->exists();
        $categories = $item->itemCategories()->with('category')->get();
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $comments = Comment::where('item_id', $item->id)->with('user')->get();
        $commentCount = $comments->count();   

        return view('comment', compact('item','categories','favoriteCount','commentCount','comments'));
    }
}
