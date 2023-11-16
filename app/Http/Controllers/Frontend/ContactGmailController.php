<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactGmailController extends Controller
{
    public function sendmail(Request $request)
    {

        $contactgmail=$request->mail;
        Mail::raw($contactgmail, function($message){
            $message->to('test@gmail.com')->subject('Thông tin liên lạc');
        });
        toastr('Đã gửi thông tin liên hệ thành công','success');
        return redirect()->route('home');
    }
}
