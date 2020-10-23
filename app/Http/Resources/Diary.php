<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Diary extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
<<<<<<< HEAD
       // $timezone = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'Asia/Manila')->setTimezone('UTC');
=======
        $timezone = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'Asia/Manila')->setTimezone('UTC');
>>>>>>> 6ddf25f4b8cf2afa6052c98bff8b2bccb9276bd1
        return[
            'fullName' => $this->user->firstName . ' ' . $this->user->middleName . ' ' . $this->user->lastName,
            'business_name'=>$this->business_name,
            'userType'=>$this->user->userType,
<<<<<<< HEAD
=======
            'time'=> $this->created_at,
>>>>>>> 6ddf25f4b8cf2afa6052c98bff8b2bccb9276bd1
            'date'=>Carbon::parse($this->created_at)->isoFormat('MMM D YYYY'),
        ];
    }
}
