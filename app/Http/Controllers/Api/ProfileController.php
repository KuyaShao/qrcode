<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfileRequest;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $profiles = auth()->user()->profiles;
        if ($profiles->city === null) {
            return view('welcome');
        }
        return redirect('/qrCode/');
    }

    public function profileShow()
    {
        $user = Auth::user();

        if ($user->userType === 'business') {
            return response()->json([
                'qid' => auth()->user()->profiles->qid,
                'userType' => 'business'
            ]);
        }
        return response()->json([
            'qid' => auth()->user()->profiles->qid,
            'userType' => 'user'
        ]);
    }


    public function update(ProfileRequest $request, $qid)
    {
        $profile = Profile::where('qid', $qid);

        $business = '';
        $businessType = "";
        $user = Auth::user();
        if ($user->userType === 'business') {
            $business = $request->business;
            $businessType = $request->businessType;
        }
        $profile->update([
            'birthday' => $request->birthday,
            'contact_number' => $request->contact_number,
            'street' => $request->street,
            'barangay' => $request->barangay,
            'bussiness_name' => $request->business_name,
            'bussiness_type' => $request->business_type,
            'city' => $request->city,
            'province' => $request->province,
        ]);
        return response()->json([
            'msg' => 'Successfully Save! Please complete another Form'
        ]);
    }
}
