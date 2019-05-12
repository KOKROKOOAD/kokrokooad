<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

     protected $fillable = ['client_id','invoice_id','phone','subscription_id','transaction_id','media_house_id','amount','transaction_status','payment_source','service','transact_charge','response'];

    public function user(){
      return  $this->belongsTo(User::class, 'client', 'client_id');
    }

    public function invoice(){
        return $this->belongsTo(Invoices::class,'client_id', 'client_id');
    }
//
//    public function schedAds(){
//        return $this->belongsTo(ScheduledAds::class);
//    }
//
//    public function receipt(){
//        return $this->hasOne(Receipt::class);
//    }
}
