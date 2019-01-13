<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['user_id','ads_id','invoice_id','transaction_id','amount', 'transaction_status'];

    public  function  user(){
      return $this->belongsTo(User::class);
    }

    public function ads(){
        return $this->belongsTo(Ads::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public  function transaction(){
        return $this->belongsTo(Transactions::class);
    }
}
