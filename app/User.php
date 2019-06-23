<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;

    protected $primaryKey = 'client_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title','email','phone1','phone2','is_admin','address','website','company_profile','company_name','media','media_house','client_id','file_size','file_path',
        'industry_type','policies','logo',
        'role','isActive','activation_code','last_login',
        'account_type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ads(){
      return  $this->hasMany(Ads::class, 'client_id', 'client_id');
    }

    public function scheduledAds(){
        return  $this->hasMany(ScheduledAds::class, 'client_id', 'client_id');

    }


    public  function segmentTitle(){
        return $this->hasMany('App\Models\RateCardTitles','client_id', 'client_id');
    }



    public  function transaction(){
      return  $this->hasMany(Transactions::class, 'client_id', 'client_id');
    }



    public function invoice(){
        return $this->hasMany(Invoices::class, 'client_id', 'client_id');
    }


}
