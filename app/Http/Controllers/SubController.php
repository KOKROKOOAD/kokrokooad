<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Events\SendAdCreatedMessageEvent;
use App\Http\Requests\StoreAds;
use App\Invoice;
use App\Invoices;
use App\Jobs\RegistrationSuccessfullJob;
use App\Jobs\SendAdCreatedMessagedJob;
use App\Models\RateCardTitles;
use App\RateCards;
use App\ScheduledAds;
use App\SpotsUsed;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\PdfToImage\Pdf;

class SubController extends Controller

{


    // fetch media houses for selected media
    public function fetchMediaHouse($media)
    {
        //  $media = $request->input('media');
        $mediaHouses = User::select('client_id', 'media_house', 'logo', 'file_path')->where('media', '=', $media)->get();
        return response()->json($mediaHouses);
    }


    // create new subscriptions
    public function createSub(Request $request)

    {
        $unique_id  = null;
        $sub = null;

        if (auth()->check()) {



            $file = Input::file('uploadedFile');
            $fileName =  $file->getClientOriginalName();
            $name = time().'_'.auth()->user()->name.'_'.$file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $file_size = $file->getSize();
            $mime_type = $file->getClientMimeType();
            $ex = explode('.', $fileName);


//            $thumbnailPath = public_path() . '/thumbnails/';
//            $fileName = hash('sha256', time());

//            if (Storage::disk('docs')) {
//                Storage::disk('docs')->put($fileName . '.' . $ext, $name);
//            }

            $path =  env('SUB_FILES_URL');
            if(File::isDirectory($path)){
                $file->move($path,$name);
            }



            $unique_id = uniqid('K', true);
            if (ScheduledAds::where('subscription_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }

//            $unique_id2 = uniqid('K', true);
//            if (Transactions::where('subscription_id', '=', $unique_id2)) {
//                $unique_id2 = uniqid('K', true);
//            }

            $sub_data = array();
//            $subscription_id = uniqid('k', true);
//            $invoice_id = uniqid('k', true);
            $sub_id = array();

              $card =   RateCardTitles::select('rate_card_title')->where('rate_card_title_id','=',$request->card_id)->get();
              $card_title =  $card[0]->rate_card_title;

               // die($chk_spots);
                $spots_left = 0;
                $spots_to_be_insert = 0;
                $id = null;
                $seg = null;

            foreach (json_decode($request->scheduledData) as $key => $values) {
                $subscription_id = uniqid('k', true);
                array_push($sub_id,$subscription_id);
                $invoice_id = uniqid('k', true);
                 $spots_to_be_insert = $values->spot;


                $sub_data = [
                    'client_id' => auth()->user()->client_id,
                    'media_house_id' => $request->input('media_house_id'),
                    'rate_card_id' => $request->input('card_id'),
                    'subscription_id' => $subscription_id,
                    'start' => $values->startDate,
                    'end' => $values->endDate,
                    'title' => $request->input('title'),
                    'spots' => $values->spot,
                    'durations' => $values->durations,
                    'rate' => $values->rate,
                    'rate_card_title' => $card_title,
                    'media_house' => $request->media_house,
                    'segments' => json_encode(['startDat'=>$values->startDate,'endDate'=>$values->endDate]),
                    'status' => 'in cart',
                    'payment_status' => 'pending',
//                    'spots_used' => '0',
                    'file_path' => $path,
                    'file_name' => $name,
                    'file_size' => $file_size,
                    'file_type' => $ex[1]
                ];

                $spots_used = [
                    'rate_card_id' => $request->input('card_id'),
                    'spots_used' => $values->spot,
                    'segment_date' => substr($values->startDate,0,10),
                    'segments' => substr($values->startDate,11,14) .'-' .substr($values->endDate,11,19),
                ];

                 $seg = substr($values->startDate,11,14) .'-' .substr($values->endDate,11,19);

                $ad  = ScheduledAds::insert($sub_data);

                if ($ad) {

                    $chk_spots  = SpotsUsed::select('id','spots_used')->whereRateCardId($request->card_id)->whereSegmentDate(substr($request->startDate,0,10))->whereSegments($seg)->get();

                    if (sizeof($chk_spots) < 1){
                        $spots = SpotsUsed::insert($spots_used);

                    }
                    else{
                        foreach ($chk_spots as $spots){
                            $spots_left  = $spots->spots_used;
                            $id  =  $spots->id;
                        }

                        $total = $spots_left + $spots_to_be_insert;
                        SpotsUsed::whereId($id)->update([
                            'spots_used' => $total
                        ]);

                    }

                }

            }


            return response()->json(['success' => 'success', 'sub_id' => $sub_id]);


        } else {
            return response()->json('failed');
        }
    }


    //fetch user transactions
    public function fetchUserTransac(Request $request)
    {

        return response()->json('success');
    }




    // login user fetch subscriptions
    public function fetchAds()
    {
          $user_subscriptions = ScheduledAds::select()->whereClientId(auth()->user()->client_id)->whereDeleted(null)->get();
       // $user_subscriptions = auth()->user()->scheduledAds;
        return  response()->json($user_subscriptions);
    }

    // fetch selected media house and ratecard for sub details
    public function fetchSubDetails($m_id,$id){
     $rate_card =  RateCardTitles::select('rate_card_title')->where('rate_card_title_id','=',$id)->get();
     $media_house = User::select('media_house')->where('client_id','=',$m_id)->get();
     $details  = [$media_house,$rate_card];
     $det = [$details[0],$details[1]];

        return response()->json(['title'=>$rate_card[0]->rate_card_title,'media_house'=>$media_house[0]->media_house]);
    }


    public function checkIfSubExist(Request $request)
    { }

    public function fetchClientSubs(){

        $subs =  ScheduledAds::select()->whereClientId(auth()->user()->client_id)->whereNull('deleted')->get();
        if (!$subs->isEmpty()){
            $media_house = User::select('media_house')->where('client_id','=',$subs[0]->media_house_id)->get();
           // $rate_card =  RateCardTitles::select('rate_card_title')->where('rate_card_title_id','=',$subs[0]->rate_card_id)->get();
            return response()->json(['status'=>'success','subs'=>$subs,'media_house'=>$media_house[0]->media_house]);
        }
        else{
            return response()->json(['status'=> 'Add subscriptions to cart']);

        }

    }


    //update subscription
    public function updateAds(Request $request)
    {

        $sub = auth()->user()->scheduledAds->where('start', '=', $request->input('startDate'))->first();
        if ($sub) {
            return response()->json($request->input('booked'));
        } else {
            $ad =   ScheduledAds::where('id', '=', (int) $request->input('event_id'));


            //$s =    $subs->save(['start'=>$request->input('startDate'),'end'=>$request->input('endDate')]);
            //            $subscriptions->start = $request->input('startDate');
            //            $subscriptions->end =  $request->input('endDate');
            //            $subscriptions->save();
            if ($sub) {
                return response()->json('success');
            } else {
                return response()->json('failed');
            }
        }
    }


         public  function getSubSelectedMedia($id){
            $media_id = ScheduledAds::select('media_house_id')->where('subscription_id','=',$id)->get();
            $selMedia = User::select('media')->where('client_id','=',$media_id[0]->media_house_id)->get();
            return response()->json($selMedia[0]->media);
           }

    //update subscription file


    public function updateFile(Request $request){

        if(Input::file('file') && Input::file('file')->isValid()) {
            $file = Input::file('file');
            $fileName =  $file->getClientOriginalName();
            $name = time().'_'.auth()->user()->name.'_'.$file->getClientOriginalName();
            $extension = Input::file('file')->getClientOriginalExtension();
            $file_size = Input::file('file')->getClientSize();
            $mime_type = Input::file('file')->getClientMimeType();
            $ext = explode('.', $fileName);
            $path = '/home/jarthur/ads/uploads';
            if(File::isDirectory($path)){
                $file->move($path,$name);
            }

            ScheduledAds::where('subscription_id','=',$request->id)->update([
                 'file_path' => $path,
                 'file_name' => $name,
                 'file_size' => $file_size,
                 'file_type' => $ext[1]
             ]);

            return response()->json('success');


        }

    }

    //soft delete subs
    public function  softDeleteSub(Request $request){
        $sub = ScheduledAds::select('deleted','deleted_at')->where('subscription_id','=',$request->input('id'))->update([
            'deleted' => 'deleted',
            'deleted_at' => Carbon::now()->toDateString(),
        ]);
        return response()->json('success');
    }

    public function test(){
        dd('hello');
    }
}
