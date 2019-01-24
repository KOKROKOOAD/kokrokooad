<?php

namespace App\Http\Controllers;

use App\MediaTypes;
use App\Models\ProgramTitle;
use App\MyEvents;
use App\User;
use Illuminate\Http\Request;

class SegmentController extends Controller
{

    public  function fetchMediaTypes(){
        $media_types = MediaTypes::all();
        return  response()->json($media_types);
    }

   public function  fetchSegmentTitles($mediaHouse){

       $user_id  = User::select('id')->where('media_house','=',$mediaHouse)->get();
       $user = User::find($user_id[0]->id);
       $adTitle =    $user->segmentTitle;
       return response()->json($adTitle);
}

    public function  fetchSegments($mediaHouse,$segment, $date){

        $user_info  = User::select('id','client_id','media')->where('media_house','=',$mediaHouse)->get();
        $segment_title_id = ProgramTitle::select('id')->where( 'adTitle', '=', $segment)->get();
        $user = User::find($user_info[0]->id);
        $segments =    $user->segment->where('ad_types_id', '=', $segment_title_id[0]->id);
        return response()->json($segments);

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
        $events  = MyEvents::all();

//        $data  = ['title'=>"meet joy",'start'=>"2019-01-24",'end'=> "2019-01-25",'color'=>'orange','textColor'=> 'white'];
//        $data2 =['title'=>"Arrange meeting with Francis",'start'=>"2019-01-26",'end'=> "2019-01-27",'color'=>'red','textColor'=> 'white'];
//        $data3 =['title'=>"play short ad in 20sec",'start'=>"2019-02-04",'end'=> "2019-02-07",'color'=>'red','textColor'=> 'white'];
//        $data = ['title'=>$request->input('title'),'start'=> $request->input('selDat'),'end'=>'2019-01-24','color'=>'black','textColor'=> 'white'];
//        $myData = array($data,$data2,$data3);
//    //dd($data);
        return  response()->json($events);
    }

    public function apiPost(Request $request){
        $events = MyEvents::create(['title'=>$request->input('title'),'start'=>$request->input('selDate'),'end'=>$request->input('selDate'),
            'events'=> $request->input('events')]);
        if($events){
            return  response()->json('New event created successfully');

        }

    }


}
