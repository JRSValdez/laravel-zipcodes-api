<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FederalEntityResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'key' => intval($this->key),
            'name' => strtoupper($this->name),
            'code' => $this->code != '' ? $this->code : null,
        ];
    }
}
