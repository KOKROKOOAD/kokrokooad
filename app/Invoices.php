<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $primaryKey = 'invoice_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected  $fillable = ['client_id','subscription_id','media_house_id','invoice_id'];

    public  function  user(){
        return   $this->belongsTo(User::class);
    }

//    public function ads(){
//      return  $this->belongsTo(Ads::class);
//    }

    public  function transaction(){
        return  $this->hasOne(Transactions::class);
    }
}
