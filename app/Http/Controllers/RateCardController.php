<?php

namespace App\Http\Controllers;

use App\Models\RateCardTitles;
use App\PrintRateCard;
use App\RateCards;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use function GuzzleHttp\Promise\all;

class RateCardController extends Controller
{
    public function fetchMediaHouses($media){
        $media = strtolower($media);
        $m = ucfirst($media);
        $mediaHouses = User:: select('media_house','client_id')->Where('media','=',$m)->get();

         return response()->json($mediaHouses);
    }

    public function fetchRateCardTitles($id){
        $ratecard_title = RateCardTitles:: select('rate_card_title','rate_card_title_id')->where('media_house_id','=',$id)->get();

        return response()->json($ratecard_title);
    }

    public function fetchRateCardDetails(Request $request){
        $media = strtolower($request->media);
        $m = ucfirst($media);
        if($m !== 'Print'){
            $rate_cards = RateCards::whereRate_card_title_id($request->get('rateCardTitleId'))->get();
            $rate_cards_title = RateCardTitles::select('rate_card_title')->whereRate_card_title_id($request->get('rateCardTitleId'))->get();
            $segments = json_decode($rate_cards[0]->segments);
            $w_segments = json_decode($rate_cards[0]->weekend_segments);
            $days_of_week = json_decode($rate_cards[0]->days_of_week);
            $days_of_weekends = $rate_cards[0]->days_of_weekend;


            return response()->json(['rate_card'=>$rate_cards, 'rate_card_title'=> $rate_cards_title,'segments'=>$segments,'days_of_week' => $days_of_week,'days_of_weekends'=>$days_of_weekends,'w_segments'=>$w_segments]);
        }
        elseif($m == 'Print'){
            $rate_cards = PrintRateCard::whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
            $print_segments = json_decode($rate_cards[0]->rate_card_data);
            $rate_cards_title = RateCardTitles::select('rate_card_title')->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
            return response()->json(['rate_card'=>$print_segments, 'rate_card_title'=> $rate_cards_title]);
        }
    }
}
