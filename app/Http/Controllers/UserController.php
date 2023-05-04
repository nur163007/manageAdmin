<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Contracts\Activity;


class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:api',[
//            'except'=>[
//                'loginCheck',
//                'register'
//            ]
//        ]);
//    }

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

/*        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'emailverified' => 1])) {
            $company = DB::table('users as u')
                ->select('u.*')
                ->where('u.username', $request['username'])
                ->first();

            if ($company->emailverified == 0 && !is_null($company->emailverified)) {
                return response()->json(array('message' => 'Your company is not active.'), 401);
            }
            //$request->session()->regenerate();


            $token = $request->user()->createToken('access_token');

            return response()->json([
                'status' => true,
                'access_token' => $token->plainTextToken,
                'user_id' => encryptId(auth()->user()->id),
                'role' => auth()->user()->role,
                'token_type' => 'Bearer',
            ]);

        }

*/
//      exit();
//        return $this->respondWithToken($token);

        $username = strtolower($request->username);
        $password = $request->password;

        if ($user = User::where('username',$username)->first()) {
            // dd("ok");
//            $passInfo = PasswordChange::where('customer_id',$customer->id)->first();
//            $confirm = isset($passInfo) ? $passInfo->confirmation : '';
            $loginpassword = Crypt::decrypt($user->password);

            if($loginpassword == $password) {
//                 dd($password);
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
                        return response()->json([
                            'msg' =>'Successfully Logged in',
                            'user'=>$user,
                        ]);
                    }
                    else{
                        return response()->json([
                            'error' => 'Your account is not active, Please contact with Admin.',
                        ]);
                    }
                }
            }

            else {
                return response()->json([
                    'error' => 'Wrong Password',
                ]);
            }
        }
        else {
            return response()->json([
                'error' => 'Please give the valid email',
            ]);

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

   public function userCreate(){
        return view('admin.user.index');
   }

//   get all role
   public function userIndex(){
        $role = Role::all();

       return response()->json([
           'userRole'=>$role,
       ]);
   }
}
