<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyEvents extends Model
{
    protected $fillable = ['title','start','end','description'];
}
