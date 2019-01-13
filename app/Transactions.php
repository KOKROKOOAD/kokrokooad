<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

     protected $fillable = ['user_id','invoice_id','ads_id','amount','transaction_status'];

    public function user(){
      return  $this->belongsTo(User::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function ads(){
        return $this->belongsTo(Ads::class);
    }

    public function receipt(){
        return $this->hasOne(Receipt::class);
    }
}
