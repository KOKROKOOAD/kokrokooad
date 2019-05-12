<?php

namespace App\Http\Controllers;

use App\MediaTypes;
use App\Models\RateCardTitles;
use App\RateCards;
use App\ScheduledAds;
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

       //$rate_cards  = RateCardTitles::all();
       $rate_cards =   RateCards::whereRate_card_title_id($id)->get();
      // $rate_cards = 'processing';
      // $rate_cards = User::whereClient_id($id);
       return response()->json($rate_cards);
}

    public function  fetchSegments(Request  $request){

//        $user_info  = User::select('id','client_id','media')->where('media_house','=',$mediaHouse)->get();
//        $segment_title_id = RateCardTitles::select('id')->where( 'adTitle', '=', $segment)->get();
//        $user = User::find($user_info[0]->id);
//        $segments =    $user->segment->where('ad_types_id', '=', $segment_title_id[0]->id);
//        return response()->json($segments);

        $rate_cards =   RateCards::whereMedia_house_id($request->media_id)->whereRate_card_title_id($request->card_id)->get();
        $card_title = null;
         $title   = RateCardTitles::select('rate_card_title')->whereMedia_house_id($request->media_id)->whereRate_card_title_id($request->card_id)->get();

         foreach ($title as $value){
           $card_title =   $value->rate_card_title;
         }


        return response()->json(['ratecards'=>$rate_cards,'card_title'=>$card_title]);


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
