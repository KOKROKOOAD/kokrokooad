<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduledAds extends Model
{
    protected $fillable = ['client_id','media_house_id','created_ad_data',
        'file_name','file_type','file_path','file_size','status','start',
        'end','title','rate_card_id','spots'];

    public  function  user(){
        return  $this->belongsTo(User::class, 'client_id', 'client_id');
    }

    protected $casts =  ['segments'=> 'array'];

    protected $primaryKey = 'subscription_id';
    protected $keyType = 'string';
    public $incrementing = false;
}
