<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Address;
use App\Models\Favorite;
use App\Models\Comment;


class ProfileController extends Controller
{
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

    public function createAddress(Request $request,$id)
    {
        $user = Auth::user();
        Address::create([
            'user_id' => $user->id,
            'postcode' => $request['postcode'],
            'address' => $request['address'],
            'building' => $request['building'],
        ]);

        $item = Item::find($id);
        $userId = Auth::id();
        $userAddress = Address::addressByUser($userId);
        return view('buy_item',compact('item','userAddress'));
    }

    public function editAddress()
    {
        return view('edit_profile');
    }

    public function soldItem()
    {
        $user = Auth::user();
        $items = Item::where('user_id',$user->id)->get();
        return view('mypage_sell',compact('user','items'));
    }
    public function boughtItem()
    {
        $user = Auth::user();
        return view('mypage_buy',compact('user'));
    }
}
