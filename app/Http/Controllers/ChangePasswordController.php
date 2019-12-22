<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function changePassword(Request $request){
        $rules = [
            'old_pass'=> ['required', new MatchOldPassword()],
            'new_pass' => ['required','different:old_pass'],
            'confirm_new_pass' => ['same:new_pass'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
           return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }


        User::where('client_id','=',auth()->user()->client_id)->update(['password'=> Hash::make($request->new_pass)]);


        return response()->json('success',200);
    }
}
