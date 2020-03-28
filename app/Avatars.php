<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatars extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'client_id', 'client_id');
    }

    protected $fillable = [
        'client_id',
        'media',
        'media_house',
        'logo',
        'file_path',
        'file_size',
        'created_by'
    ];
}
