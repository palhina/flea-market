<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Favorite;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function comment($id)
    {
        $user = Auth::user();
        $item = Item::find($id);

        $userId = Auth::user()->id;
        $favorites =  Favorite::where('user_id',$userId)->get();
        $categories = $item->itemCategories()->with('category')->get();
        
        // マイリスト登録数をカウント
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $commentCount = Comment::where('item_id', $item->id)->count();

        return view('comment', compact('item','favorites','categories','favoriteCount','commentCount'));
    }

    public function commentTo(Request $request,$id)
    // バリデーション付けたらRequest部分変更
    {
        $user = Auth::user();
        $item = Item::find($id);
        Comment::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => $request->input('comment'),
        ]);
        $categories = $item->itemCategories()->with('category')->get();
        
        // マイリスト登録数をカウント
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $commentCount = Comment::where('item_id', $item->id)->count();

        return view('comment', compact('item','categories','favoriteCount','commentCount'))->with('result', 'コメントを送信しました');
    }
}
