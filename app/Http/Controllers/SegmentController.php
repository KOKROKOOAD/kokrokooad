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

//        $user_info  = User::select('id','client_id','media')->where('media_house','=',$mediaHouse)->get();
//        $segment_title_id = ProgramTitle::select('id')->where( 'adTitle', '=', $segment)->get();
//        $user = User::find($user_info[0]->id);
//        $segments =    $user->segment->where('ad_types_id', '=', $segment_title_id[0]->id);
        return response()->json('am in the controller');

    }

    public function api(){
        return  response()->json('am in the controller');
    }

}
