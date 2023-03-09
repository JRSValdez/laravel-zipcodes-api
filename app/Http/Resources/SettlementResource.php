<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettlementResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'key' => intval($this->key),
            'name' => $this->name,
            'zone_type' => $this->zone_type,
            'settlement_type' => new SettlementTypeResource($this->settlement_type),
        ];
    }
}
