<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
use App\Models\Item;
use App\Models\Address;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\SoldItem;

class ProfileController extends Controller
{
    // 住所登録ページ表示
    public function address()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $userAddress = Address::addressByUser($userId);
        if($userAddress){
            return view('redirect_edit_profile',compact('user'));
        }
        else{
            return view('address_registration',compact('user'));
        }
    }

    // 住所登録処理
    public function createAddress(AddressRequest $request,$id)
    {
        $user = Auth::user();
        Address::create([
            'user_id' => $user->id,
            'postcode' => $request['postcode'],
            'address' => $request['address'],
            'building' => $request['building'],
        ]);

        return redirect('/')->with('result','住所を登録しました');
    }

    // プロフィール編集画面表示
    public function editAddress()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $userAddress = Address::addressByUser($userId);
        if($userAddress)
        {
            $address = Address::where('user_id',$user->id)->first();
            return view('edit_profile',compact('user','address'));
        }
        else{
            return view('address_registration',compact('user'));
        }
    }

    // プロフィール編集処理
    public function postEditAddress(AddressRequest $request, $id)
    {
        $user = Auth::user();
        $address = Address::where('user_id',$user->id)->first();

        if ($request->hasFile('profile_img'))
        {
            $filename=$request->profile_img->getClientOriginalName();
            $img=$request->profile_img->storeAs('profile',$filename,'public');
            $user->img_url = $img;
        }

        $user->name = $request->input('name');
        $address->postcode = $request->input('postcode');
        $address->address = $request->input('address');
        $address->building = $request->input('building');

        $user->save();
        $address->save();
        return redirect('/')->with('result', 'プロフィールが更新されました');
    }

    // マイページ(出品商品)表示
    public function soldItem()
    {
        $user = Auth::user();
        $items = Item::where('user_id',$user->id)->get();
        return view('mypage_sell',compact('user','items'));
    }

    // マイページ(購入商品)表示
    public function boughtItem()
    {
        $user = Auth::user();
        $soldItems = SoldItem::where('user_id',$user->id)->get();
        return view('mypage_buy',compact('user','soldItems'));
    }
}
