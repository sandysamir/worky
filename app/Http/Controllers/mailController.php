<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    
    public function SendMail(User $user)
    {
        $data=[
            'title'=>'mail from workspace_app',
            'body'=>'you can now contatc with your sponser'
        ];
        $sandy="sandy";  
        Mail::to('sandysamir18@gmail.com')->send(new SendMail($data));
      
        return view('mail',compact('data','sandy','user'));
    }

    }