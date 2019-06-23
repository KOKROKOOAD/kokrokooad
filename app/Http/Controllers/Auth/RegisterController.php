<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrationSuccessEvent;
use App\Jobs\RegistrationSuccessfullJob;
use App\User;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register-success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['account'] == 'personal'){

            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'phone1' => 'required|numeric|max:10|unique:users',
                'phone2' => 'required|numeric|max:10|unique:users',
                'address' => 'required|string|max:100',
                'industry_type' => 'required|string|max:255',
                'title' => 'required|string|max:50',
                'password' => 'required|string|min:6|confirmed',
            ]);

        }


        if($data['account'] == 'company') {

            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone1' => 'required|number|max:10|unique:users',
                'phone2' => 'required|number|max:10|unique:users',
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

        }

        if($data['account'] == 'MEDIA') {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone1' => 'required|string|max:10|unique:users',
                'phone2' => 'required|string|max:10|unique:users',
                'media_type' => 'required|string',
                'media_house' => 'required|string|max:50',
                'address' => 'required|string|max:100',
                'policies' => 'required|string|max:100',
                'company_profile' => 'required|string|max:255',
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'industry_type' => 'required|string|max:255',
                'title' => 'required|string|max:50',
                'website' => 'required|string|max:100|unique:users',
                'company_name' => 'required|string|max:100|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

        }


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create( array $data)
    {
          // validate request input if account type is personal
         if($data['account'] == 'personal'){
             $unique_id = uniqid('K',true);
             if(User::where('client_id', '=',$unique_id)){
                 $unique_id = uniqid('K',true);
             }
             $user = User::create([
                 'name' => $data['name'],
                 'title' => $data['title'],
                 'email' => $data['email'],
                 'phone1' => $data['phone1'],
                 'phone2' => $data['phone2'],
                 'address' => $data['address'],
                 'industry_type' => $data['industry_type'],
                 'role'   =>  'user',
                 'is_admin'   => false,
                 'client_id'=>  $unique_id,
                 'account_type' =>  $data['account'],
                 'password' => Hash::make($data['password']),
             ]);
             $this->dispatch(new RegistrationSuccessfullJob($user));
         }

         // validate request inputs if account type is company or organisation
         if($data['account'] == 'company'){

             $unique_id = uniqid('K',true);
             if(User::where('client_id', '=',$unique_id)){
                 $unique_id = uniqid('K',true);
             }
             // dd($unique_id);

             if(Input::file('file') && Input::file('file')->isValid()) {

                 $name = Input::file('file')->getClientOriginalName();
                 $extension = Input::file('file')->getClientOriginalExtension();
                 $file_size = Input::file('file')->getClientSize();
                 $mime_type = Input::file('file')->getClientMimeType();
                 $path = Input::file('file')->storeAs('public/images',time(). $name);

                 $thumbnailPath = public_path().'/thumbnails/';

                 if( is_writable($thumbnailPath)){
                     if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'){
                         $thumbnail = Image::make(Input::file('file'));
                         $thumbnail->resize(320,320);
                         $thumbnail->save($thumbnailPath.time().$name);
                         $path = Input::file('file')->storeAs('/images',time().$name);
                     }
//                    elseif ($extension === 'pdf') {
//                        $pdf = new Pdf($file);
//                       // $pdf->setOutputFormat('jpg');
//                        $pdf->saveImage($thumbnailPath.'hello.jpg');
//                        $path = $request->file('file')->storeAs('/images','hello.jpg');
//                       return  dd($pdf);
//                    }

                 }

                 $user = User::create([

                     'name' => $data['name'],
                     'title' => $data['title'],
                     'email' => $data['email'],
                     'phone1' => $data['phone1'],
                     'phone2' => $data['phone2'],
                     'address' => $data['address'],
                     'media' => $data['media_type'],
                     'media_house' => $data['media_house'],
                     'website' => $data['website'],
                     'company_profile' => $data['company_profile'],
                     'company_name' => $data['company_name'],
                     'industry_type' => $data['industry_type'],
                     'policies' => $data['policies'],
                     'logo' => $name,
                     'is_admin'   => false,
                     'file_path' => $path,
                     'file_size' => $file_size,
                     'role' => 'user',
                     'client_id' => $unique_id,
                     'account_type' => 'media house',
                     'password' => Hash::make($data['password']),
                 ]);
                 $this->dispatch(new RegistrationSuccessfullJob($user));
             }
         }

        // validate request inputs if account type is media house
        if($data['account'] == 'MEDIA'){



          $unique_id = uniqid('K',true);
          if(User::where('client_id', '=',$unique_id)){
              $unique_id = uniqid('K',true);
          }
         // dd($unique_id);

            if(Input::file('file') && Input::file('file')->isValid()) {
                $path = '';
                $name = Input::file('file')->getClientOriginalName();
                $extension = Input::file('file')->getClientOriginalExtension();
                $file_size = Input::file('file')->getClientSize();
                $mime_type = Input::file('file')->getClientMimeType();
              //  $path = Input::file('file')->storeAs('public/images',time(). $name);

                $thumbnailPath = public_path().'/thumbnails/';

                if( is_writable($thumbnailPath)){
                    if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'){
                        $thumbnail = Image::make(Input::file('file'));
                        $thumbnail->resize(120,120);
                        $thumbnail->save($thumbnailPath.$name);
                        $path = Input::file('file')->storeAs('/images',$name);
                    }
//                    elseif ($extension === 'pdf') {
//                        $pdf = new Pdf($file);
//                       // $pdf->setOutputFormat('jpg');
//                        $pdf->saveImage($thumbnailPath.'hello.jpg');
//                        $path = $request->file('file')->storeAs('/images','hello.jpg');
//                       return  dd($pdf);
//                    }

                }
                $user = User::create([

                    'name' => $data['name'],
                    'title' => $data['title'],
                    'email' => $data['email'],
                    'phone1' => $data['phone1'],
                    'phone2' => $data['phone2'],
                    'address' => $data['address'],
                    'media' => $data['media_type'],
                    'media_house' => $data['media_house'],
                    'website' => $data['website'],
                    'company_profile' => $data['company_profile'],
                    'company_name' => $data['company_name'],
                    'industry_type' => $data['industry_type'],
                    'policies' => $data['policies'],
                    'logo' => $name,
                    'is_admin'   => false,
                    'file_path' => $path,
                    'file_size' => $file_size,
                    'role' => 'user',
                    'client_id' => $unique_id,
                    'account_type' => 'media house',
                    'password' => Hash::make($data['password']),
                ]);
                $this->dispatch(new RegistrationSuccessfullJob($user));
            }

        }

       // return  $user;
    }
}
