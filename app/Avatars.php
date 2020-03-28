<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatars extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'client_id', 'client_id');
    }
}
