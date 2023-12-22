<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Favorite;
use App\Models\Comment;



class ItemController extends Controller
{
    // 商品一覧(おすすめ)表示
    public function index()
    {
        $items=Item::all();
        // 余裕あればfavorite数順に並べ替え？
        return view('items_recommend',compact('items'));
    }
    
    // 商品一覧(お気に入り)表示
    public function favorite()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id',$user->id)->get();
        return view('items_favorite',compact('favorites'));
    }

    // 商品詳細ページ表示
    public function detail($id)
    {
        $item = Item::find($id);
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $commentCount = Comment::where('item_id', $item->id)->count();
        $categories = $item->itemCategories()->with('category')->get();
        return view('item_detail',compact('item','categories','favoriteCount','commentCount'));
    }

    // 購入ページ表示
    public function purchase($id)
    {
        $item = Item::find($id);
        return view('buy_item',compact('item'));
    }

    // 出品ページ表示
    public function list()
    {
        return view('sell_item');
    }

    // 検索結果表示(商品名、カテゴリー名、商品説明で検索可能)
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $items = Item::query()
        ->where(function ($query) use ($keyword) {
            $query->where('item_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%');
        })
        ->orWhereHas('itemCategories.category', function ($query) use ($keyword) {
            $query->where('category_name', 'LIKE', '%' . $keyword . '%');
        })
        ->get();
        return view('items_recommend',compact('items'));
    }
}