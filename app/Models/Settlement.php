<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $table = 'settlements';

    protected $fillable = [
        'name', 'zone_type', 'key', 'settlement_type_id'
    ];

    protected $primaryKey = 'key';

    public function settlement_type()
    {
        return $this->belongsTo(SettletmentTypes::class, 'settlement_type_id', 'id');
    }
}
