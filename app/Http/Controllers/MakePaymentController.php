<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakePaymentController extends Controller
{
    //
    public function makePayment(){
        return response()->json('success');
    }
}
