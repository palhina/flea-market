<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ProfileController extends Controller
{
    public function address()
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
