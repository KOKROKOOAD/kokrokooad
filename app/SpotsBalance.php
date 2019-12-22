<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotsBalance extends Model
{
    protected $fillable = [
        'ratecard_id',
        'spots_used',
        'segments',
        'segment_date',
    ];
}
