<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function address()
    {
        return view('edit_profile');
    }

    public function soldItem()
    {
        return view('mypage_sell');
    }
    public function boughtItem()
    {
        return view('mypage_buy');
    }
}
