<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Gift extends JsonResource
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
        return [
            ('id')=>$this->id,
            ('category_id')=>$this->category_id,
            ('name')=>$this->name,
            ('gift_image')=>$this->gift_image,
            ('description')=>$this->description,
            ('price')=>$this->price,
            ('discount')=>$this->discount,
            ('stock')=>$this->stock,
            ('color')=>$this->color,
            ('warp_paper')=>$this->warp_paper,
            ('card')=>$this->card,
            ('created_at')=>$this->created_at->format('d/m/y'),
            ('card')=>$this->updated_at->format('d/m/y'),







           ];








    }
}
