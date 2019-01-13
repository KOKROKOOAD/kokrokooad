<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title','email','phone1','phone2','address','website','company_profile','company_name','media','media_house','client_id','file_size','file_path',
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

    public function scheduledAd(){
        return  $this->hasMany(ScheduleAd::class, 'client_id', 'client_id');

    }

    public function card(){
        return $this->hasMany(TvRadioCardRates::class, 'client_id','client_id');
    }

    public  function segmentTitle(){
        return $this->hasMany('App\Models\ProgramTitle','client_id', 'client_id');
    }

    public  function segment(){
        return $this->hasMany('App\Models\ProgramLineups', 'client_id', 'client_id' );
    }

    public  function transaction(){
      return  $this->hasMany(Transactions::class);
    }

    public function messages(){
        return $this->hasMany(Messages::class);
    }

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }

    public function receipt(){
        return $this->hasMany(Receipt::class);
    }
}
