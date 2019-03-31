<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = ['client_id','ad_title','media_house','program','status','publish_date','rate','ad_description','subscription_id','file_name','spots','media','file_size','file_type','file_path'];
    public  function  user(){
        return  $this->belongsTo(User::class, 'client_id', 'client_id');
    }

    public  function  invoice(){
        return $this->hasOne(Invoice::class);
    }
}
