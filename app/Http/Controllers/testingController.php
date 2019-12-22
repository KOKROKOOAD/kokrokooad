<?php

namespace App\Http\Controllers;

use App\ScheduledAds;
use Illuminate\Http\Request;

class testingController extends Controller
{
    public function testing(){
        $ads = ScheduledAds::select('mon_segments')->whereId(12)->get();
       $t = json_decode($ads[0]->mon_segments);

        //die(var_dump($t));
        return response()->json($t);
    }
}
