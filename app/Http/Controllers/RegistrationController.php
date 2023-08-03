<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Tymon\JWTAuth\Facades\JWTAuth;


class RegistrationController extends Controller
{
    public function _construct(){
        $this->middleware('auth:api',['except'=>['login','register']]);
    }

    public function showRegisterFrom(){
        return view('admin.register');
    }

    public function getTerms(){
        return view('admin.terms');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|min:3|max:70',
            'email' => 'required|string|email|max:80|unique:registrations',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = Registration::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'nid' => $request->nid,
            'verification_link' =>sha1(time()),
        ]);

        // return response()->json([
        //     'msg' =>'Registration data sent to your email, please verified',
        //      'user'=>$user,
        //  ],200);

        if ($user != null){
            MailController::sendSignupEmail($user->first_name,$user->email,$user->verification_link);
//            dd(MailController::sendSignupEmail($user->firstname,$user->email,$user->verification_link))
             return response()->json([
                'msg' =>'Registration data sent to your email, please verified',
                 'user'=>$user,
             ],200);
        }

    }

    public function verifyEmail(){
        $verifyLink = \Illuminate\Support\Facades\Request::get('code');
        $register = Registration::where(['verification_link'=>$verifyLink])->first();
        if ($register != null){
            $register->is_email_verified = 1;
            $register->save();

            $user = User::create([
                'username' => $register->email,
                'first_name' => $register->first_name,
                'last_name' => $register->last_name,
                'email' => $register->email,
                'mobile' => $register->mobile,
                'company' => $register->company,
                'address' => $register->address,
                'state' => $register->state,
                'city' => $register->city,
                'zip_code' => $register->zip_code,
                'country' => $register->country,
                'role' => 3,
                'nid' => $register->nid,
                'password' => bcrypt('abc123456'),
                'is_email_verified' => 1,
                'is_active' => 1,
            ]);
//            $password = bcrypt($user->password);
            $password = 'abc123456';
            if ($user != null){
                MailController::sendVerifyEmail($user->first_name,$user->email,$password);
                return redirect('/')->with('alert_success','Your account is active now,your username and password sent to your verified email.');
            }
        }
    }

    public function loginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(),[
            'username' => 'required|string',
            'password' => 'required|string|min:5|',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        if(!$token = auth()->attempt($validator->validated())){
            return response()->json(['error' =>'unauthorized'],401);
        }

        return $this->respondWithToken($token);
    }

       protected function respondWithToken($token){
       return response()->json([
           'msg' => 'logged in successfully',
           'success' => true,
           'access_token'=>$token,
           'token_type'=>'Bearer',
           'created_at' => Date::now(),
           'expires_in'=>auth()->factory()->getTTL()*60*8,
           'user'=>auth()->user()
       ]);
   }

   public function logout(Request $request){
            auth()->logout();
            return response()->json(['msg' =>'user logged out','success'=>true]);
   }

}
