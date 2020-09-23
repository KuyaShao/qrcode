<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;

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
        $this->middleware('auth');
    }

    public function index(){
        $profile = auth()->user()->profiles;
        if($profile->city === null){
            return redirect('/profile');
        }

        if($profile->healthDeclaration->q1a = null){
            return redirect('/questionare');
        }
        return view('welcome');
    }

    public function create(){
        $qid = auth()->user()->profiles->qid;
        $userType = auth()->user()->userType;
        return response()->json([
            'qid'=>$qid,
            'userType'=>$userType
        ],200);
    }
}
