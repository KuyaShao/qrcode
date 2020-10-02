<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrCodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');

    }

    public function index(){
        $profile = auth()->user()->profiles;
        if($profile->city === null){
            return redirect('/profile');
        }


        return view('welcome');
    }
    public function names(){
         $user = Auth::user();
         $profile = Auth::user()->profiles()->first();
        return response()->json([
            'names'=>$user,
            'business'=>$profile
        ]);
    }
    public function create(){
        $qid = Auth::user()->profiles->qid;
        $userType = Auth::user()->userType;
        return response()->json([
            'qid'=>$qid,
            'userType'=>$userType
        ],200);
    }
}
