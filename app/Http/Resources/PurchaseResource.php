<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
return [
            'id'          => $this->resource->id,
            'user_id'     => $this->resource->user_id,
            'user'        => $this->resource->user,
            'invoice_no'  => $this->resource->invoice_no,
            'total_price' => $this->resource->total_price,
            'items'       => PurchaseItemResource::collection($this->resource->items) 
        ];
    }
}
