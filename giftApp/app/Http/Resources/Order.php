<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    // order resource
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            ('id')=>$this->id,
            ('user_id')=>$this->user_id,
            ('gift_id')=>$this->gift_id,
            ('total_amount')=>$this->total_amount,
            ('bank_transaction_id')=>$this->bank_transaction_id,
            ('created_at')=>$this->created_at->format('d/m/y'),
            ('card')=>$this->updated_at->format('d/m/y'),







           ];








    }
}


