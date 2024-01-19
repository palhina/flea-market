<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InformationMail;
use App\Models\User;
use App\Http\Requests\MailRequest;

class MailController extends Controller
{
    // メール送信画面表示
    public function email(){
        return view('send_email');
    }

    // メール送信処理
    public function sendEmail(MailRequest $request){
        $selectedAddress = $request->input('email_address');
        $users = [];
        if($selectedAddress === 'customer'){
            $users = User::whereNull('manager_id')->get();
        }
        elseif($selectedAddress === 'staff'){
            $users = User::whereNotNull('manager_id')->get();
        }
        elseif($selectedAddress === 'all'){
            $users = User::all();   
        }
       	foreach($users as $user)
        $data = [
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        Mail::to($user->email)->send(new InformationMail($data));
        return redirect('/send_email')->with('result', 'メールが送信されました。');
    }
}
