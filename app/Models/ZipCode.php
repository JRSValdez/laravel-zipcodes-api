<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $table = 'zip_codes';

    protected $fillable = [
        'code', 'municipality_id', 'created_at', 'settlements'
    ];
}
