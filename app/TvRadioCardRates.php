<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvRadioCardRates extends Model
{

    public function user(){
     return $this->belongsTo(User::class, 'client_id', 'client_id');
}


}
