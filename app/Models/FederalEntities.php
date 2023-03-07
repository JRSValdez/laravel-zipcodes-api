<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FederalEntities extends Model
{
    protected $table = 'federal_entities';

    protected $fillable = [
        'name', 'code', 'key'
    ];
}
