<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettlementTypeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name
        ];
    }
}
