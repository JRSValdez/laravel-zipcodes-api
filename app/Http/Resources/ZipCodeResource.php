<?php

namespace App\Http\Resources;

use App\Models\Settlement;
use Illuminate\Http\Resources\Json\JsonResource;

class ZipCodeResource extends JsonResource
{

    public function toArray($request)
    {
        $settlements = Settlement::orderBy('key')
            ->where('municipality_id', $this->municipality_id)
            ->whereIn('key', explode(',', $this->settlements))
            ->get();
        return [
            'zip_code' => $this->code,
            'locality' => $this->locality,
            'federal_entity' => new FederalEntityResource($this->federal_entity),
            'settlements' => SettlementResource::collection($settlements),
            'municipality' => new MunicipalityResource($this->municipality),
        ];
    }
}
