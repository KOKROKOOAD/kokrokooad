<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrationSuccessEvent;
use App\Jobs\RegistrationSuccessfullJob;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/auth/registration-success';

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
                'phone1' => 'required|numeric|unique:users',
                'phone2' => 'required|numeric|unique:users',
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

        }

        if($data['account'] == 'MEDIA') {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone1' => 'required|string|max:10|unique:users',
                'phone2' => 'required|string|max:10|unique:users',
                'media_type' => 'required|string',
                'media_house' => 'required|string|max:50|unique:users',
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
          $user =   User::create([
                 'name' => $data['name'],
                 'title' => $data['title'],
                 'email' => $data['email'],
                 'phone1' => $data['phone1'],
                 'phone2' => $data['phone2'],
                 'address' => $data['address'],
                 'industry_type' => $data['industry_type'],
                 'role'   =>  'user',
                 'is_admin'   => false,
                 'isActive'   => 'pending',
                 'client_id'=>  $unique_id,
                 'account_type' =>  $data['account'],
                 'password' => Hash::make($data['password']),
             ]);
          //   $this->dispatch(new RegistrationSuccessfullJob($user));
         }



         // validate request inputs if account type is company or organisation
         if($data['account'] == 'company'){

             $unique_id = uniqid('K',true);
             if(User::where('client_id', '=',$unique_id)){
                 $unique_id = uniqid('K',true);
             }


             if(Input::file('logo') && Input::file('logo')->isValid()) {

                 $file = Input::file('logo');

                 $user_name  = explode(' ',$data['name']);
                 $name = time().'_'.$user_name[0].'_'.$user_name[1.].$file->getClientOriginalName();
                 $extension = Input::file('logo')->getClientOriginalExtension();
                 $file_size = Input::file('logo')->getClientSize();
                 $mime_type = Input::file('logo')->getClientMimeType();

                        $path = '/var/www/html/uploads/';

                 if(File::isDirectory($path)){

                     if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'){
                         $thumbnail = Image::make(Input::file('logo'));
                         $thumbnail->resize(120,120);
                         $thumbnail->save($path.'mediaHouseLogos/'.$name);
                         $file->move($path.'avatars/',$name);

                     }
//                    elseif ($extension === 'pdf') {
//                        $pdf = new Pdf($file);
//                       // $pdf->setOutputFormat('jpg');
//                        $pdf->saveImage($thumbnailPath.'hello.jpg');
//                        $path = $request->file('file')->storeAs('/images','hello.jpg');
//                       return  dd($pdf);//                 if(File::isDirectory($path) or File::makeDirectory($path, 755, true)){

//                    }

                 }

                $user =   User::create([

                     'name' => $data['name'],
                     'title' => $data['title'],
                     'email' => $data['email'],
                     'phone1' => $data['phone1'],
                     'phone2' => $data['phone2'],
                     'address' => $data['address'],
                     'media' => $data['media_type'],
                    // 'media_house' => $data['media_house'],
                     'website' => $data['website'],
                     'company_profile' => $data['company_profile'],
                     'company_name' => $data['company_name'],
                     'industry_type' => $data['industry_type'],
                     'policies' => $data['policies'],
                     'logo' => $name,
                     'is_admin'   => false,
                     'isActive'   => 'pending',
                     'file_path' => env('FILE_UPLOAD','/var/www/html/uploads/'),
                     'file_size' => $file_size,
                     'role' => 'user',
                     'client_id' => $unique_id,
                     'account_type' => 'Organization',
                     'password' => Hash::make($data['password']),
                 ]);
               //  $this->dispatch(new RegistrationSuccessfullJob($user));
             }
             else{
                 dd('invalid file');
             }
         }

        // validate request inputs if account type is media house
        if($data['account'] == 'MEDIA'){

          $unique_id = uniqid('K',true);
          if(User::where('client_id', '=',$unique_id)){
              $unique_id = uniqid('K',true);
          }

            if(Input::file('file') && Input::file('file')->isValid()) {
                $file = Input::file('file');
                $user_name  = explode(' ',$data['name']);
                $name = time().'_'.$user_name[0].'_'.$user_name[1.].$file->getClientOriginalName();
                $extension = Input::file('file')->getClientOriginalExtension();
                $file_size = Input::file('file')->getClientSize();
                $mime_type = Input::file('file')->getClientMimeType();

                $path = '/var/www/html/uploads/';
//                if(File::isDirectory($path) or File::makeDirectory($path, 775, true)){
                    if(File::isDirectory($path)){
                    if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'){
                        $thumbnail = Image::make(Input::file('file'));
                        $thumbnail->resize(120,120);
                        $thumbnail->save($path.'mediaHouseLogos/'.$name);
                        $file->move($path.'avatars/',$name);

                    }
//                    elseif ($extension === 'pdf') {
//                        $pdf = new Pdf($file);
//                       // $pdf->setOutputFormat('jpg');
//                        $pdf->saveImage($thumbnailPath.'hello.jpg');
//                        $path = $request->file('file')->storeAs('/images','hello.jpg');
//                       return  dd($pdf);
//                    }

                }
               $user =  User::create([

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
                    'is_admin'   => true,
                    'isActive'   => 'pending',
                    'file_path' => env('FILE_UPLOAD','/var/www/html/uploads/'),
                    'file_size' => $file_size,
                    'role' => 'super_admin',
                    'client_id' => $unique_id,
                    'account_type' => 'media house',
                    'password' => Hash::make($data['password']),
                ]);
             //   $this->dispatch(new RegistrationSuccessfullJob($user));
            }

        }

        //return  $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

}
