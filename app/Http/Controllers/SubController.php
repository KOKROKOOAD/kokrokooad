<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Events\SendAdCreatedMessageEvent;
use App\Http\Requests\StoreAds;
use App\Jobs\SendAdCreatedMessagedJob;
use App\ScheduledAds;
use App\TvRadioCardRates;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\PdfToImage\Pdf;

class SubController extends Controller

{

    public function createSub(Request $request)

    {

        $unique_id = uniqid('K',true);
        if(Ads::where('subscription_id', '=',$unique_id)){
            $unique_id = uniqid('K',true);
        }

//            $file = $request->file('image')->getClientOriginalExtension();
//            dd($file);


//        if( auth()->check() &&  $request->hasFile('uploadedFile') && $request->file('uploadedFile')->isValid()){
//            $file_name = '';
//           // $file = $request->file('file');
//            $ext = $request->file('uploadedFile')->getClientOriginalName();
//            dd($ext);
//             }
//        else{
//            $file = 'NO FILE';
//        }
//
        if( auth()->check() && $request->hasFile('uploadedFile') && $request->file('uploadedFile')->isValid()){

            $file = $request->file('uploadedFile');
            $name = $request->file('uploadedFile')->getClientOriginalName();
            $ext = $request->file('uploadedFile')->getClientOriginalExtension();
            $file_size = $request->file('uploadedFile')->getSize();
            $mime_type = $request->file('uploadedFile')->getClientMimeType();

            $thumbnailPath = public_path().'/thumbnails/';
            $path = hash( 'sha256', time());

                if(Storage::disk('uploads')){
                    Storage::disk('uploads')->put($path.'.'.$ext,$name);
                   // if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'){
//                        $thumbnail = Image::make($file);
//                        $thumbnail->resize(760,537);
                       // $thumbnail->save($thumbnailPath.time().$name);
                       /// $fileName = time().$name;
                       // $path = $request->file('file')->storeAs($thumbnailPath,time().$fileName);
                    //}
//                    elseif ($extension === 'pdf' || $extension === 'txt' || 'xsls' || $extension === 'odt') {
//                        $pdf = new Pdf($file);
//                       // $pdf->setOutputFormat('jpg');
//                        $pdf->saveImage($thumbnailPath.'hello.jpg');
//                        $path = $request->file('file')->storeAs('/images','hello.jpg');
//                       return  dd($pdf);
//                    }

                }

            $ad = ScheduledAds::create([

                'client_id' =>  auth()->user()->client_id,
                'media_house_id'=> $request->input('media_house_id'),
                'created_ad_data'=> $request->input('created_ad_data'),
                'status' => 'pending',
                'file_path'=>$path.'.'.$ext,
                'file_name' => $name,
                'file_size' => $file_size,
                'file_type' => $mime_type
            ]);
             event(new SendAdCreatedMessageEvent($ad->user));
            return  response()->json($ad->created_ad_data);

        }else{
            return response()->json('failed');
        }

   }

     public function loadMedia(){
       $ads = User::select('account_type')->distinct()->get();
         return response()->json($ads);
     }

     // login user subscriptions
     public function fetchAds(){
        $ads = auth()->user()->ads;
      //   $ads = $user->ads;
         //  $ads = Ads::orderBy('created_at','DESC')->paginate(50);
         return response()->json($ads);
     }

     public function fetchMediaHouse($media){
      //  $media = $request->input('media');
        $mediaHouses = User::select('client_id','media_house','logo','file_path')->where('media', '=', $media )->get();
         return response()->json($mediaHouses);
     }

    public function fetchMediaProgram($mediaHouse){
        //  $media = $request-
            $client_id = '';
            $id = User::select('id')->where('media_house', '=', "$mediaHouse")->get();
              foreach($id as $user_id){
                  $client_id = $user_id->id;
              }
         $mediaProgram = User::find($client_id)->card;
        return response()->json($mediaProgram);
    }

    public function fetchProgramDates($mediaProgram){


        $publishDate = TvRadioCardRates::select(array('publish_date', 'rates','spots'))->where('programs', '=', "$mediaProgram")->get();

        return response()->json($publishDate);
    }
}
