<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Sex;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray([
            'id'            => (string)$this->id,
            'body_weight'   => (string)$this->body_weight,
            'product'       => $this->product,
            'calories'      => (string)$this->calories,
            'proteins'      => (string)$this->proteins,
            'fats'          => (string)$this->fats,
            'carbohydrates' => (string)$this->carbohydrates,
            'weight'        => (string)$this->weight,
            'views'         => (string)$this->views
        ]);
    }
}
