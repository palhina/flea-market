<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InformationMail;
use App\Models\User;

class MailController extends Controller
{
    // メール送信画面表示
    public function email(){
        return view('send_email');
    }

    // メール送信処理
    public function sendEmail(Request $request){
        $users = User::all();
       	foreach($users as $user)
        $data = [
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        Mail::to($user->email)->send(new InformationMail($data));
        return redirect('/send_email')->with('result', 'メールが送信されました。');
    }
}
