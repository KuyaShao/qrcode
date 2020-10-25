<?php

namespace App\Http\Controllers\Business;

use App\HealthDeclaration;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(Request $request){
       return view('welcome');
    }
    public function login(LoginRequest $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        } else {
            return response()->json([
                'msg' => 'Incorrect login details'
            ],401);
        }

        $user = Auth::user();
        if ($user->userType === 'business') {
            return response()->json([
                'msg' => 'your logged in'
            ],200);
        }else{
            Auth::logout();
            return response()->json([
                'msg' => 'Incorrect login details'
            ], 401);
        }
    }


    public function register(RegisterRequest $request){


        $user = User::create([
            'firstName'=>$request->firstName,
            'middleName'=>$request->middleName,
            'lastName'=>$request->lastName,
            'email'=>$request->email,
            'userType'=>'business',
            'password'=>bcrypt($request->password),
            'classification'=>'Safe'
        ]);

        $user->profiles()->create([
            'user_id'=>$user->id,
            'qid'=>Str::uuid(),
        ]);

        $profile = $user->profiles->id;
        HealthDeclaration::create([
            'profile_id'=>$profile
        ]);

        return $user;
    }
}
