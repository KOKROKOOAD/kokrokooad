<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segments extends Model
{
    protected  $fillable = [
        'schedule_ad_id',
        'spots',
        'end_date',
        'start_date',
        'segment_day',
    ];
}
