<?php

namespace App\Http\Resources;

use App\Models\Settlement;
use Illuminate\Http\Resources\Json\JsonResource;

class ZipCodeResource extends JsonResource
{

    public function toArray($request)
    {
        $settlements = Settlement::where('zip_code', $this->code)->get();
        return [
            'zip_code' => $this->code,
            'locality' => $this->locality,
            'federal_entity' => new FederalEntityResource($this->federal_entity),
            'settlements' => SettlementResource::collection($settlements),
            'municipality' => new MunicipalityResource($this->municipality),
        ];
    }
}
