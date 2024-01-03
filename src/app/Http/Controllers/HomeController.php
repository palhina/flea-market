<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Manager;
use App\Models\SoldItem;


class HomeController extends Controller
{
    //  管理者メニュー表示
    public function adminMenu()
    {
        $admin = Auth::guard('admins')->user();
        return view('admin_menu',compact('admin'));
    }

    //  ユーザー削除画面表示
    public function deleteUser()
    {
        $users = User::all();
        return view('user_delete',compact('users'));
    }

    // ユーザー削除処理
    public function postDeleteUser($id)
    {
        $user = User::find($id)->delete();
        return redirect('/delete/user')->with('result', 'ユーザー削除に成功しました');
    }

    //  取引履歴確認
    public function transaction()
    {
        $managers = Manager::all();
        $data = [];
        foreach($managers as $manager){
            $transactions = SoldItem::whereHas('item.user', function ($query) use ($manager) {
                $query->where('manager_id', $manager->id);
            })->with(['user', 'item'])->get();

            $data[] = [
                'manager' => $manager,
                'transactions' => $transactions,
            ];
        }
        return view('check_transaction',compact('data'));
    }


    //  店舗代表者メニュー表示
    public function managerMenu()
    {
        $manager = Auth::guard('managers')->user();
        return view('manager_menu',compact('manager'));
    }

    //  スタッフ削除画面表示
    public function deleteStaff()
    {
        $managerId = Auth::guard('managers')->id();
        $managerName = Manager::find($managerId)->name;
        $users = User::where('manager_id',$managerId)->get();
        return view('staff_delete',compact('users','managerName'));
    }

    // ショップスタッフ削除処理
    public function postDeleteStaff($id)
    {
        $user = User::find($id)->delete();
        return redirect('/delete/staff')->with('result', 'スタッフ削除に成功しました');
    }
}
