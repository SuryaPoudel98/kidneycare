<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Mailcontroller extends Controller
{

    public function index(Request $request)
    {  
      
        $fullname=$request->fullname;
        $phone=$request->phone;
        $email=$request->email;
        $subject=$request->subject;
        $message1=$request->message;


        $data=['name'=>$fullname,'phone'=>$phone, 'email'=>$email, 'subject'=> $subject,'message1'=> $message1];
        $user['to']='testlaravel60@gmail.com';
       
         Mail::send('mail',$data,function($message) use ($user) 
         {
             $message->to($user['to']);
             $message->subject('hello dev');
          } 
        );

          return view('frontend1.thankyou');
         
    }
}
