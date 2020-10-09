<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiaryResource;
use App\Http\Resources\Diary;
use App\User;
use App\Tracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request){
        $user = Auth::user();
        $profiles = $user->profiles->bussiness_name;
        if($user->userType === 'user'){
            $trackers = Tracker::with('user')->orderBy('id','DESC')->where('user_id',$user->id)->paginate($request->total);
            $collection = Diary::collection($trackers);
            return new DiaryResource($collection);
        }else{
            $business = Tracker::with('user')->orderBy('id','DESC')->where('business_name',$profiles)->paginate($request->total);
            $collection = Diary::collection($business);
            return new DiaryResource($collection);
        }
    }

    public function create(){
        return Auth::user();
    }
}
