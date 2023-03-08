<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MunicipalityResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'key' => intval($this->key),
            'name' => strtoupper($this->name)
        ];
    }
}