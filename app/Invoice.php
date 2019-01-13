<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public  function  user(){
      return   $this->belongsTo(User::class);
    }

    public function ads(){
      return  $this->belongsTo(Ads::class);
    }

    public  function transaction(){
      return  $this->hasOne(Transactions::class);
    }
}
