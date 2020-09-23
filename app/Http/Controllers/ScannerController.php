<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScannerRequest;
use App\Http\Resources\BusinessResource;
use App\Http\Resources\ProfileResource;
use App\Profile;
use App\Tracker;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($qid){
      return view('welcome');
    }

    public function edit($qid){
        $profile = Profile::where('qid',$qid)->first();
        $user = User::where('id',$profile->user_id)->first();

        $client = new ProfileResource($user);
        $loginUser = auth()->user()->id;
        $business_user = User::with('profiles')->where('id',$loginUser)->first();

        $business = new BusinessResource($business_user);
        return response()->json(['business'=>$business,'profile'=>$client]);
    }
    public function store(ScannerRequest $request,Tracker $tracker){
        $tracker->create([
            'user_id'=>$request->id,
            'name'=>$request->name,
            'business_name'=>$request->business_name,
            'business_type'=>$request->business_type,
            'from'=>$request->from,
            'temperature'=>$request->temperature
        ]);

        return response()->json([
            'msg'=>'Successfully Save Thankyou for your Cooperation'
        ],200);
    }
}
