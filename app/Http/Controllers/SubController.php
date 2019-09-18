<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Events\SendAdCreatedMessageEvent;
use App\Http\Requests\StoreAds;
use App\Invoice;
use App\Invoices;
use App\Jobs\SendAdCreatedMessagedJob;
use App\Models\RateCardTitles;
use App\ScheduledAds;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
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

        //$startDates = json_decode($request->input('startDate'));
        //  $endDate = json_decode($request->input('endDate'));
        $unique_id  = null;
        $sub = null;

        // $event = MyEvents::select()->where('start','=',$request->input('startDate'))->get();
        //         foreach ($startDates as $key=>$value){
        //
        //             $sub = auth()->user()->scheduledAds->where('start','=',$value)->first();
        //         }
        //
        ////        $sub = auth()->user()->scheduledAds->where('start','=',$request->input('startDate'))->first();
        //        if ($sub){
        //
        //            return response()->json($request->input('booked'));

        //        }

        //dd($request->file('uploadedFile'));


        //        if($request->file('uploadedFile')->isValid()){
        //               dd($request->file('uploadedFile'));
        //
        //           }
        //           else{
        //               dd('file could not pass');
        //           }


        if (auth()->check()) {


            $d = json_decode($request->input('created_ad_data'));
            $startDate = array();
            $endDate = array();
            foreach ($d as $key) {
                $startDate[] = $key->startDate . $key->startTime;
                $endDate[] = $key->endDate . $key->endTime;
            }


            $unique_id = uniqid('K', true);
            if (ScheduledAds::where('subscription_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }

            $file = $request->file('uploadedFile');
            $name = $request->file('uploadedFile')->getClientOriginalName();
            $ext = $request->file('uploadedFile')->getClientOriginalExtension();
            $file_size = $request->file('uploadedFile')->getSize();
            $mime_type = $request->file('uploadedFile')->getClientMimeType();
            $path = '';

            $thumbnailPath = public_path() . '/thumbnails/';
            $fileName = hash('sha256', time());

            if (Storage::disk('docs')) {
                Storage::disk('docs')->put($fileName . '.' . $ext, $name);
            }
            //   $segment_title_id = RateCardTitles::select('id')->where('adTitle', '=', $request->input('rate_card_title'), 'and', 'client_id', '=', $request->input('client_id'))->get();

            $sub_data = array();
            $subscription_id = uniqid('k', true);
            $invoice_id = uniqid('k', true);

            foreach ($startDate as $key => $values) {

                $sub_data[] = [
                    'client_id' => auth()->user()->client_id,
                    'media_house_id' => $request->input('media_house_id'),
                    'rate_card_id' => $request->input('card_id'),
                    'subscription_id' => $subscription_id,
                    'start' => $values,
                    'end' => $endDate[$key],
                    'title' => $request->input('title'),
                    'created_ad_data' => $request->input('created_ad_data'),
                    'status' => 'pending',
                    'file_path' => storage_path() . '/files/uploads/' . $fileName . '.' . $ext,
                    'file_name' => $name,
                    'file_size' => $file_size,
                    'file_type' => $mime_type
                ];
            }

            $ad  = ScheduledAds::insert($sub_data);

            if ($ad) {

                $invoice = Invoices::create([
                    'client_id' => auth()->user()->client_id,
                    'invoice_id' => $invoice_id,
                    'media_house_id' => $request->input('media_house_id'),
                    'subscription_id' => $subscription_id,
                ]);

                if ($invoice) {

                    // event(new SendAdCreatedMessageEvent($ad->user));
                    return response()->json(['success' => 'success', 'sub_id' => $subscription_id, 'invoice_id' => $invoice_id]);
                } else {
                    return response()->json('could not insert');
                }
            }
        } else {
            return response()->json('failed');
        }
    }


    //fetch user transactions
    public function fetchUserTransac(Request $request)
    {

        $user = User::find(auth()->user()->client_id);

        return response()->json($user->transaction);
    }




    // login user fetch subscriptions
    public function fetchAds()
    {

        $user_subscriptions = auth()->user()->scheduledAds;
        return  response()->json($user_subscriptions);
    }


    public function checkIfSubExist(Request $request)
    { }


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
}
