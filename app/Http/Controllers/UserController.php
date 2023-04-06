<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function register(){
        return view('admin.register');
    }
    public function getTerms(){
        return view('admin.terms');
    }
//    public function store(Request $request){
//        dd($request->all());
//    }
    public function loginCheck(Request $request){

        $validator = Validator::make($request->all(),[
            'username' => 'required|string',
            'password' => 'required|string|min:6|',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }

//        if (!$token = Auth::attempt($validator->validated())){
//            return response()->json([
//                'success'=>false,
//                'msg' =>'Username or Password is Incorrect',
//            ]);
//        }
//        return $this->respondWithToken($token);

        $username = strtolower($request->username);
        if ($user = User::where('username',$username)->first()) {
            // dd("ok");
//            $passInfo = PasswordChange::where('customer_id',$customer->id)->first();
//            $confirm = isset($passInfo) ? $passInfo->confirmation : '';
            if(Hash::check($request->password, $user->password)) {
                // dd("ok");
                // dd($user->full_name);
                $logged_in_data = session([
                    'user_name' => $user->first_name,
                    'user_id' => $user->id,
                    'username'=> $username,
                    'role'=> $user->role,
                    'user_status'=> $user->emailverified,
                    'phone'=> $user->mobile,
                    'address'=> $user->state,

                ]);
                // return view('home.dashboard');
                if($user->role == 3){
                    if($user->emailverified == 1){
                        return redirect('api/dashboard');
                    }
                    else{
                        return redirect('/api')->with('error','Your account is not active, Please contact with manager.');
                    }
                }
            }

            else {
                return back()->with('error','Wrong Password');
            }
        }
        else {
            return back()->with('error','Please give the valid email');

        }
    }
//    protected function respondWithToken($token){
//        return response()->json([
//            'success' => true,
//            'access_token'=>$token,
//            'token_type'=>'Bearer',
//            'expires_in'=>auth()->factory()->getTTL()*60
//        ]);
//    }
}
