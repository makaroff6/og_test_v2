<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->name,
            'qty' => $this->remains()->sum('qty'),
            'category' => $this->properties()->whereHas('property', function ($query) {
                $query->where('name', 'Категория');
            })->first()->value,
            'brand' => $this->brand()->first()->value,
            'status' => $this->status
        ];
    }
}
