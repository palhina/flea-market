<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ShoppingRequest;
use App\Models\Item;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Address;
use App\Models\Payment;
use App\Models\SoldItem;
use App\Models\Category;
use App\Models\ItemCategory;
use App\Models\Condition;


class ItemController extends Controller
{
    // 商品一覧(おすすめ)表示
    public function index()
    {
        $items=Item::all();
        return view('items_recommend',compact('items'));
    }
    
    // 商品一覧(マイリスト)表示
    public function favorite()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id',$user->id)->get();
        return view('items_favorite',compact('favorites'));
    }

    // 商品詳細ページ表示
    public function detail($id)
    {
        $user = Auth::user();
        $item = Item::find($id);
        if($user !== null)
        {
            $item->isFavorite = Favorite::isFavorite($item->id, $user->id)->exists();
        }  
        $favoriteCount = Favorite::where('item_id', $item->id)->count();
        $commentCount = Comment::where('item_id', $item->id)->count();
        $item->isBought = SoldItem::isBought($item->id)->exists();
        $categories = ItemCategory::where('item_id',$item->id)->get();

        return view('item_detail',compact('item','categories','favoriteCount','commentCount'));
    }

    // 購入ページ表示
    public function purchase($id)
    {
        $item = Item::find($id);
        $payments = Payment::all();
        $userId = Auth::id();
        $userAddress = Address::addressByUser($userId);
        return view('buy_item',compact('item','payments','userAddress'));
    }

    // 商品購入処理
    public function getItem(ShoppingRequest $request,$id)
    {
        $item = Item::find($id);
        $user = Auth::user();
        SoldItem::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'payment_id' => $request->input('payment')
        ]);
        return redirect('/')->with('result','商品を購入しました');
    }

    // 出品ページ表示
    public function list()
    {
        $user = Auth::user();
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell_item',compact('user','categories','conditions'));
    }

    // 出品処理
    public function sell(ItemRequest $request,$id)
    {
        $userId = Auth::id();
        $filename=$request->item_img->getClientOriginalName();
        $img=$request->item_img->storeAs('item',$filename,'public');
        
        $item = Item::create([
            'user_id' => $userId,
            'condition_id' => $request->input('condition_name'),
            'img_url' => $img,
            'item_name' => $request->input('name'),
            'description' => $request->input('comment'),
            'price' => $request->input('price'),
        ]);

        
        ItemCategory::create([
            'item_id' => $item->id,
            'category_id' => $request->input('category_name'),
        ]);

        if ($request->filled('category_name2')) {
            ItemCategory::create([
                'item_id' => $item->id,
                'category_id' => $request->input('category_name2')
            ]);
        }   
        
        return redirect('/')->with('result','出品処理が完了しました');
    }

    // 検索結果表示(商品名、カテゴリー名、商品説明で検索可能)
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $items = Item::query()
            ->where(function ($query) use ($keyword)
            {
                $query->where('item_name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('description', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('categories', function ($query) use ($keyword) 
            {
                $query->where('category_name', 'LIKE', '%' . $keyword . '%');
            })
            ->get();
        return view('items_recommend',compact('items'));
    }
}