<?php

namespace App\Http\Controllers;

use App\MediaTypes;
use App\Models\ProgramTitle;
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
        $data  = ['title'=>"in  a meeting",'start'=>"2016-09-07 00:00:00",'end'=> "2016-09-08 00:00:00"];
  //  dd($data);
        return  response()->json($data);
    }

}
