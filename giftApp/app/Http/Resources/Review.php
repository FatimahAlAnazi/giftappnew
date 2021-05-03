<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // i create resource review

        return [
            ('id')=>$this->id,
            ('gift_id')=>$this->gift_id,
            ('customer_name')=>$this->customer_name,
            ('review')=>$this->review,
            ('star')=>$this->star,
            ('created_at')=>$this->created_at->format('d/m/y'),
            ('card')=>$this->updated_at->format('d/m/y'),







           ];

    }
}
