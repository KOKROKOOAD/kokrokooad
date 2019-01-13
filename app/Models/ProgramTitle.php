<?php

namespace App;

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProgramTitle
 *
 * @property int $id
 * @property string $client_id
 * @property string $adTitle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ProgramTitle extends Eloquent
{
    public function user(){
        return $this->belongsTo('App\User', 'client_id', 'client_id');
    }

    protected $fillable = [
        'client_id',
        'adTitle',

    ];
}
