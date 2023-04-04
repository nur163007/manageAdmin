<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email,$verification_link){
        $data =[
            'firstname'=>$name,
            'verification_link'=>$verification_link
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendVerifyEmail($name, $email,$password){
        $data =[
            'firstname'=>$name,
            'password'=>$password,
            'username'=>$email
        ];
        Mail::to($email)->send(new VerifyEmail($data));
    }
}
