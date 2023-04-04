<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class RegistrationController extends Controller
{
    public function showRegisterFrom(){
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'firstname' => 'required|string|min:3|max:70',
            'email' => 'required|string|email|max:80|unique:registrations',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        $user = Registration::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country' => $request->country,
            'terms' => $request->terms,
            'verification_link' =>sha1(time()),
        ]);

        if ($user != null){
            MailController::sendSignupEmail($user->firstname,$user->email,$user->verification_link);
//            dd(MailController::sendSignupEmail($user->firstname,$user->email,$user->verification_link))
             return response()->json([
                'msg' =>'Registration data sent to your email, please verified',
                 'user'=>$user,
             ]);
        }

    }

    public function verifyEmail(){
        $verifyLink = \Illuminate\Support\Facades\Request::get('code');
        $register = Registration::where(['verification_link'=>$verifyLink])->first();
        if ($register != null){
            $register->is_verified = 1;
            $register->save();

            $user = User::create([
                'username' => $register->email,
                'firstname' => $register->firstname,
                'lastname' => $register->lastname,
                'email' => $register->email,
                'mobile' => $register->mobile,
                'country' => $register->country,
                'password' => Crypt::encrypt(Str::random(10)),
                'emailverified' => 1,
            ]);
//            $password = bcrypt($user->password);
            $password = Crypt::decrypt($user->password);
            if ($user != null){
                MailController::sendVerifyEmail($user->firstname,$user->email,$password);
                return redirect('/api')->with('alert_success','Your account is active now,your username and password sent to your verified email.');
            }
        }
    }

}
