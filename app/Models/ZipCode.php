<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $table = 'zip_codes';

    protected $fillable = [
        'code', 'municipality_id', 'created_at', 'settlements'
    ];

    public function federal_entity()
    {
        return $this->belongsTo(FederalEntities::class, 'federal_entity_id', 'key');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id', 'key');
    }
}
