<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettletmentTypes extends Model
{
    protected $table = 'settlement_types';

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'key';
}
