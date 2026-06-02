<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
		'product_name' => $this->product->name,
		'image' => $this->product->image_url,
            'price' => $this->unit_price,
            'quantity' => $this->quantity,
            'subtotal' => $this->subtotal
        ];
    }
}
