<?php

namespace App\Http\Controllers;

use App\Models\RateCardTitles;
use App\RateCards;
use Illuminate\Http\Request;

class SpotsController extends Controller
{
   public function checkRateCardDurations($id){
       $rate_cards  = RateCards::select('days_of_week','days_of_weekend')->where('rate_card_title_id','=',$id)->get();
       $days_of_week = json_decode($rate_cards[0]->days_of_week);
       $days_of_weekend = json_decode($rate_cards[0]->days_of_weekend);

       return response()->json(['days_of_week'=>$days_of_week,'days_of_weekend' => $days_of_weekend ]);

   }



}
