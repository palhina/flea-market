<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\ItemCategory;
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

        $categories = ItemCategory::where('item_id',$item->id)->get();
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
        $categories = ItemCategory::where('item_id',$item->id)->get();
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $comments = Comment::where('item_id', $item->id)->with('user')->get();
        $commentCount = $comments->count();   

        return view('comment', compact('item','categories','favoriteCount','commentCount','comments'));
    }

    // コメント削除機能
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $itemId = $comment->item_id;
        $comment->delete();   

        $item = Item::find($itemId);
        $user = Auth::user();
        $item->isFavorite = Favorite::isFavorite($itemId, $user->id)->exists();

        $categories = ItemCategory::where('item_id',$itemId)->get();
        $favoriteCount = Favorite::where('item_id', $itemId)->count();       
        $comments = Comment::where('item_id', $itemId)->with('user')->get();
        $commentCount = $comments->count();

        return view('comment', compact('item','categories','favoriteCount','commentCount','comments'));
    }
}
