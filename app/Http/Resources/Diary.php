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
       // $timezone = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'Asia/Manila')->setTimezone('UTC');
        return[
            'fullName' => $this->user->firstName . ' ' . $this->user->middleName . ' ' . $this->user->lastName,
            'business_name'=>$this->business_name,
            'userType'=>$this->user->userType,
            'date'=>Carbon::parse($this->created_at)->isoFormat('MMM D YYYY'),
        ];
    }
}
