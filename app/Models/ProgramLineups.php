<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProgramLineups
 *
 * @property int $id
 * @property string $client_id
 * @property string $ad_types_id
 * @property string $segments
 * @property string $durations
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
*/
class ProgramLineups extends Eloquent
{
    public function user(){
        return $this->belongsTo('App\User', 'client_id', 'client_id');
    }

    protected $casts =  ['segments'=> 'array'];

    protected $fillable = [
        'client_id',
        'ad_types_id',
        'segments',
        'durations',
        ];
}
