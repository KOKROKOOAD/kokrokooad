<?php

namespace App\Http\Controllers;

use App\MediaTypes;
use App\Models\RateCardTitles;
use App\PrintRateCard;
use App\RateCards;
use App\ScheduledAds;
use App\SpotsUsed;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class SegmentController extends Controller
{

    public  function fetchMediaTypes(){
        $media_types = MediaTypes::all();
        return  response()->json($media_types);
    }

   public function  fetchSegmentTitles($id){


       $rate_cards  = RateCardTitles::all()->where('media_house_id','=',$id);

       return response()->json($rate_cards);
}




    public function  fetchSegments(Request  $request){

        $card_title = null;
        $rate_cards =   RateCards::select('days_of_week','segments','days_of_weekend','weekend_segments','rate_card_id')->whereMedia_house_id($request->media_id)->whereRate_card_title_id($request->card_id)->get();
        $spots_check = SpotsUsed::select('segments','spots_used')->whereRateCardId($request->card_id)->whereSegmentDate($request->startDate)->get();
        $title   = RateCardTitles::select('rate_card_title')->whereMedia_house_id($request->media_id)->whereRate_card_title_id($request->card_id)->get();

         foreach ($title as $value){
           $card_title =   $value->rate_card_title;
         }

        return response()->json(['days_of_week'=>json_decode($rate_cards[0]->days_of_week),'days_of_weekend'=>$rate_cards[0]->days_of_weekend,
            'segments'=> $rate_cards[0]->segments,'wsegments'=> $rate_cards[0]->weekend_segments,'card_title'=>$card_title,'spots_check'=>$spots_check]);


    }

         // fetch print segments
    public  function fetchPrintSegments(Request $request){
        $print_rate_cards  = PrintRateCard::select('rate_card_data')->whereMedia_house_id($request->media_id)->whereRate_card_title_id($request->card_id)->get();
        $spots_check = SpotsUsed::select('segments','spots_used')->whereRateCardId($request->card_id)->whereSegmentDate($request->startDate)->get();

        $card_title = null;
        $title   = RateCardTitles::select('rate_card_title')->whereMedia_house_id($request->media_id)->whereRate_card_title_id($request->card_id)->get();

        foreach ($title as $value){
            $card_title =   $value->rate_card_title;
        }
        return response()->json(['card_title'=>$card_title, 'print_rate_cards'=> $print_rate_cards,'spots_check' => $spots_check]);
    }


    public function checkSpots($segment){
      $message = '';
      if ($segment === '07:00 -- 08:00'){
          $message = 'Segment available';
      }
      else{
          $message = 'Segment is full. Please try another segment';
      }

        return  response()->json($message);
    }


    public function api(Request $request){
        $user_subscriptions = auth()->user()->scheduledAds;
     //   $events  =  $user->scheduledAds;

//        $data  = ['title'=>"meet joy",'start'=>"2019-01-24",'end'=> "2019-01-25",'color'=>'orange','textColor'=> 'white'];
//        $data2 =['title'=>"Arrange meeting with Francis",'start'=>"2019-01-26",'end'=> "2019-01-27",'color'=>'red','textColor'=> 'white'];
//        $data3 =['title'=>"play short ad in 20sec",'start'=>"2019-02-04",'end'=> "2019-02-07",'color'=>'red','textColor'=> 'white'];
//        $data = ['title'=>$request->input('title'),'start'=> $request->input('selDat'),'end'=>'2019-01-24','color'=>'black','textColor'=> 'white'];
//        $myData = array($data,$data2,$data3);
   //   dd($user);
       return  response()->json($user_subscriptions);
    }

    public function apiPost(Request $request){
        $events = MyEvents::create(['title'=>$request->input('title'),'start'=>$request->input('startDate'),'end'=>$request->input('endDate'),
            'description'=> $request->input('description')]);
        if($events){
            return  response()->json('New event created successfully');

        }

    }

//    public function eventUpdate(Request $request){
//
//        $event =  MyEvents::find($request->input('id'));
//        $event->start =  $request->input('startDate');
//        $event->end   = $request->input('endDate');
//        $event->save();
//        if ($event){
//            return response()->json('Even successfully updated');
//        }
//    }

//    public function eventCheck(Request $request){
//        $event = MyEvents::select()->where('start','=',$request->input('startDate'))->get();
//        if (sizeof($event) > 0){
//
//            return response()->json($request->input('booked'));
//        }
//        else{
//            return response()->json('available');
//
//        }
//    }



}
