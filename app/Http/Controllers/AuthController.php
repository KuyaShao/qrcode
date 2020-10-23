<?php

namespace App\Http\Controllers;

use App\HealthDeclaration;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AccountResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Hash;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    use SendsPasswordResetEmails, ResetsPasswords {
        SendsPasswordResetEmails::broker insteadof ResetsPasswords;
        ResetsPasswords::credentials insteadof SendsPasswordResetEmails;
    }

    public function index(Request $request)
    {
        if (!Auth::check() && $request->path() != 'login') {
            return redirect('/login');
        }

        if (!Auth::check() && $request->path() == 'login') {
            return view('welcome');
        }

        $user = Auth::user();
        if ($user->userType === 'user' || $user->userType === 'business') {
            if ($request->path() == 'login') {
                return redirect('/');
            }
            return redirect('/qrcode');
        }
        return redirect('/login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        } else {
            return response()->json([
                'msg' => 'Incorrect login details'
            ], 401);
        }

        $user = Auth::user();
        if ($user->userType === 'user') {
            return response()->json([
                'msg' => 'your logged in'
            ], 200);
        } else {
            Auth::logout();
            return response()->json([
                'msg' => 'Incorrect login details'
            ], 401);
        }
    }

//
    public function logout()
    {
        $user = Auth::user();
        Auth::logout();
        if ($user->userType === 'user') {
            return redirect('/login');
        } else {
            return redirect('/business/login');
        }


    }

    public function sendPasswordResetLink(Request $request)
    {
        $this->sendResetLinkEmail($request);
        return redirect('/');
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        event(new PasswordReset($user));
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }
//
//
//    public function register(RegisterRequest $request){
//
//        $user = User::create([
//            'firstName'=>$request->firstName,
//            'middleName'=>$request->middleName,
//            'lastName'=>$request->lastName,
//            'email'=>$request->email,
//            'password'=>bcrypt($request->password),
//            'classification'=>'Safe'
//        ]);
//
//        $user->profiles()->create([
//            'user_id'=>$user->id,
//            'qid'=>Str::uuid(),
//        ]);
//
//        $profile = $user->profiles->id;
//        HealthDeclaration::create([
//            'profile_id'=>$profile
//        ]);
//
//
//        return $user;
//    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'classification' => 'Safe'
        ]);

        $user->profiles()->create([
            'user_id' => $user->id,
            'qid' => Str::uuid(),
        ]);

        $profile = $user->profiles->id;
        HealthDeclaration::create([
            'profile_id' => $profile
        ]);


        return $this->guard()->login($user);


    }

    public function account(){
        return new AccountResource(Auth::user());
    }

    public function changepassword(Request $request){
         $this->validate($request,[
            'password'=>'bail|confirmed|required|min:8',
        ]);
        Auth::user()->update([
            'password'=>bcrypt($request->password)
        ]);
        return back();
    }
}
