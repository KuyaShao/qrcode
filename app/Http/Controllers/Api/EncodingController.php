<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EncodingController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'picture'=>'required'
        ]);

       return auth()->user()->encoding()->create([
            'picture'=>$request->picture
        ]);
    }
}
