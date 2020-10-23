<?php

namespace App\Http\Controllers\Api;

use App\HealthDeclaration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HealthDeclarationRequest;
use Illuminate\Http\Request;

class HealthDeclarationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');

    }

    public function __invoke(HealthDeclarationRequest $request)
    {
        $profile = auth()->user()->profiles->id;
        $qid = auth()->user()->profiles->qid;
        HealthDeclaration::where('profile_id', $profile)->update([
            'q1a' => $request->q1a,
            'q1b' => $request->q1b,
            'q1c' => $request->q1c,
            'q1d' => $request->q1d,
            'q1e' => $request->q1e,
            'q1f' => $request->q1f,
            'q1g' => $request->q1g,
            'q2' => $request->q2,
            'q3' => $request->q3,
            'q4' => $request->q4,
            'q5' => $request->q5,
            'q5a' => $request->q5a,
            'q6' => $request->q6,
            'q7' => $request->q7,
        ]);
        return response()->json(['msg' => 'Successfull Save! Thanks for Cooperation', 'qid' => $qid], 200);
    }
}
