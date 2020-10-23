<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'fullName'=>$this->firstName .' '.$this->middleName.' '.$this->lastName,
            'business_name'=>$this->profiles->bussiness_name,
            'business_type'=>$this->profiles->bussiness_type,
            'address'=>$this->profiles->street.' '.$this->profiles->barangay.' '.$this->profiles->city.' '.$this->profiles->province,
        ];
    }
}
