<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    public  function  getUserProfile(){
        $user = User::where('client_id','=',auth()->user()->client_id)->get();
          return response()->json($user);
}

    public function updateUserPersonalProfile(Request $request){

           $validator =   Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                 'email' => [
                     'required',
                     Rule::unique('users')->ignore(auth()->user()->id)
                 ],

               'phone1' => [
                   'required',
                   Rule::unique('users')->ignore(auth()->user()->id),
               ],
                'phone2' => [
                   'required',
                    Rule::unique('users')->ignore(auth()->user()->id)
                ],
                'address' => 'required|string|max:100',
                'industry_type' => 'required|string|max:255',
                'title' => 'required|string|max:50',
            ]);

           if ($validator->fails()){
               return response()->json([
                   'errors' => $validator->getMessageBag()->toArray()
               ]);
           }
           else{
               $user = [
                   'name' =>  $request->input('name'),
                   'title' => $request->input('title'),
                   'email' => $request->input('email'),
                   'phone1' => $request->input('phone1'),
                   'phone2' => $request->input('phone2'),
                   'address' => $request->input('address'),
                   'industry_type' => $request->input('industry_type'),
               ];

               User::where('client_id','=',Auth()->user()->client_id)->update($user);

               return response()->json('success');
           }

   }

    public function updateUserComProfile(Request $request)
    {
         Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone1' => 'required|numeric|unique:users',
            'phone2' => 'required|numeric|unique:users',
            'address' => 'required|string|max:100',
            'policies' => 'required|string|max:100',
            'company_profile' => 'required|string|max:100',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'industry_type' => 'required|string|max:255',
            'title' => 'required|string|max:50',
            'website' => 'required|string|max:100|unique:users',
            'company_name' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if(Input::file('file') && Input::file('file')->isValid()) {
            $file = Input::file('file');
            $name = time().'_'.$request->input('name').'_'.$file->getClientOriginalName();
            $extension = Input::file('file')->getClientOriginalExtension();
            $file_size = Input::file('file')->getClientSize();
            $mime_type = Input::file('file')->getClientMimeType();

            $path = '/home/jarthur/register/';
            if(File::isDirectory($path) or File::makeDirectory($path, 755, true)){

                if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'){
                    $thumbnail = Image::make(Input::file('file'));
                    $thumbnail->resize(120,120);
                    $thumbnail->save($path.'thumbnails/'.$name);
                    $file->move($path.'logos/',$name);

                }

            }

            $user = [
                'name' =>  $request->input('name'),
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'phone1' => $request->input('phone1'),
                'phone2' => $request->input('phone2'),
                'address' => $request->input('address'),
                'media' => $request->input('media_type'),
                'media_house' => $request->input('media_house'),
                'website' => $request->input('website'),
                'company_profile' => $request->input('company_profile'),
                'company_name' => $request->input('company_name'),
                'industry_type' => $request->input('industry_type'),
                'policies' => $request->input('policies'),
                'logo' => $name,
                'file_path' => $path,
                'file_size' => $file_size,
                'account_type' => 'media house',
            ];

            User::where('client_id','=',Auth()->user()->client_id)->update($user);

            return response()->json('success');
        }
    }

}
