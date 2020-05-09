<?php

namespace App\Http\Controllers\Auth;

use App\Avatars;
use App\Events\RegistrationSuccessEvent;
use App\Jobs\RegistrationSuccessfullJob;
use App\User;
use App\Http\Controllers\Controller;
use App\Services\SendTextMessage;
use App\UserProfile;
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

        if ($data['account'] == 'personal') {

            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'phone1' => 'required|regex:/(0)[0-9]{9}/|unique:users',
                'phone2' => 'nullable|regex:/(0)[0-9]{9}/|unique:user_profiles',
                'address' => 'required|string|max:100',
                'industry_type' => 'required|string|max:255',
                'title' => 'required|string|max:50',
                'terms' => 'required',
                'password' => 'required|string|min:6|confirmed',
            ]);
        }


        if ($data['account'] == 'company') {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone1' => 'required|numeric|unique:users',
                'phone2' => 'nullable|numeric|unique:user_profiles',
                'address' => 'required|string|max:100',
                'policies' => 'required|string|max:100',
                'company_profile' => 'required|string|max:100',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'industry_type' => 'required|string|max:255',
                'title' => 'required|string|max:50',
                'website' => 'required|string|max:100|unique:user_profiles',
                'company_name' => 'required|string|max:100|unique:user_profiles',
                'password' => 'required|string|min:6|confirmed',
                'terms' => 'required'
            ]);
        }

        if ($data['account'] == 'MEDIA') {

            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone1' => 'required|numeric|unique:users',
                'phone2' => 'nullable|numeric|unique:user_profiles',
                'media_type' => 'required|string',
                'media_house' => 'required|string|max:50|unique:users',
                'address' => 'required|string|max:100',
                'policies' => 'required|string|max:100',
                'company_profile' => 'required|string|max:255',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'industry_type' => 'required|string|max:255',
                'title' => 'required|string|max:50',
                'website' => 'required|string|max:100|unique:user_profiles',
                'company_name' => 'required|string|max:100|unique:user_profiles',
                'terms' => 'required',
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
    protected function create(array $data)
    {

        $sendMsg = new SendTextMessage(env("SMS_USERNAME"), env("SMS_PASSWORD"));


        // validate request input if account type is personal
        if ($data['account'] == 'personal') {

            $unique_id = uniqid('K', true);
            if (User::where('client_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }
            $user =   User::create([
                'name' => $data['name'],
                'title' => $data['title'],
                'email' => $data['email'],
                'phone1' => $data['phone1'],
                'role'   =>  'user',
                'isActive'   => 'pending',
                'client_id' =>  $unique_id,
                'account_type' =>  $data['account'],
                'password' => Hash::make($data['password']),
            ]);

            UserProfile::create([
                'phone2' => $data['phone2'],
                'address' => $data['address'],
                'industry_type' => $data['industry_type'],
                'client_id' =>  $unique_id,

            ]);

            $this->dispatch(new RegistrationSuccessfullJob($user));
            $sendMsg->registrationSuccessText($data['name'], $data['phone1']);
        }



        // validate request inputs if account type is company or organisation
        if ($data['account'] == 'company') {

            $unique_id = uniqid('K', true);
            if (User::where('client_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }


            if (Input::file('logo') && Input::file('logo')->isValid()) {

                $file = Input::file('logo');
                $name = time() . '_' . $data['email'] . $file->getClientOriginalName();
                $extension = Input::file('logo')->getClientOriginalExtension();
                $file_size = Input::file('logo')->getClientSize();
                $mime_type = Input::file('logo')->getClientMimeType();

                $path = '/var/www/html/uploads/';

                if (File::isDirectory($path)) {

                    if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                        $thumbnail = Image::make(Input::file('logo'));
                        $thumbnail->resize(120, 120);
                        $thumbnail->save($path . 'mediaHouseLogos/' . $name);
                        $file->move($path . 'avatars/', $name);
                    }
                }

                $user =   User::create([

                    'name' => $data['name'],
                    'title' => $data['title'],
                    'email' => $data['email'],
                    'phone1' => $data['phone1'],
                    'isActive'   => 'pending',
                    'role' => 'user',
                    'client_id' => $unique_id,
                    'account_type' => 'personal',
                    'created_by' => $unique_id,

                    'password' => Hash::make($data['password']),
                ]);

                Avatars::create([
                    'client_id' =>  $unique_id,
                    'file_path' => env('FILE_UPLOAD', '/var/www/html/uploads/'),
                    'file_size' => $file_size,
                    'logo' => $name,
                    'created_by' => $unique_id,
                    'media_house' => $data['company_name'],
                    'media' =>  $data['company_name']
                ]);

                UserProfile::create([
                    'phone2' => $data['phone2'],
                    'address' => $data['address'],
                    'industry_type' => $data['industry_type'],
                    'client_id' =>  $unique_id,
                    'website' => $data['website'],
                    'company_profile' => $data['company_profile'],
                    'company_name' => $data['company_name'],
                    'policies' => $data['policies'],
                ]);

                $this->dispatch(new RegistrationSuccessfullJob($user));
                $sendMsg->registrationSuccessText($data['name'], $data['phone1']);
            }
        }

        // validate request inputs if account type is media house
        if ($data['account'] == 'MEDIA') {
            $unique_id = uniqid('K', true);
            if (User::where('client_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }

            if (Input::file('file') && Input::file('file')->isValid()) {
                $file = Input::file('file');
                $name = time() . '_' . $data['email'] . $file->getClientOriginalName();
                $extension = Input::file('file')->getClientOriginalExtension();
                $file_size = Input::file('file')->getClientSize();
                $mime_type = Input::file('file')->getClientMimeType();

                $path = '/var/www/html/uploads/';
                //                if(File::isDirectory($path) or File::makeDirectory($path, 775, true)){
                if (File::isDirectory($path)) {
                    if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                        $thumbnail = Image::make(Input::file('file'));
                        $thumbnail->resize(120, 120);
                        $thumbnail->save($path . 'mediaHouseLogos/' . $name);
                        $file->move($path . 'avatars/', $name);
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
                    'media' => $data['media_type'],
                    'media_house' => $data['media_house'],
                    'logo' => $name,
                    'isActive'   => 'pending',
                    'role' => 'super_admin',
                    'client_id' => $unique_id,
                    'account_type' => 'media house',
                    'created_by' => $unique_id,
                    'password' => Hash::make($data['password']),
                ]);

                Avatars::create([
                    'client_id' =>  $unique_id,
                    'file_path' => env('FILE_UPLOAD', '/var/www/html/uploads/'),
                    'file_size' => $file_size,
                    'logo' => $name,
                    'created_by' => $unique_id,
                    'media_house' => $data['media_house'],
                    'media' => $data['media_type'],
                    'created_by' => $unique_id

                ]);

                UserProfile::create([
                    'phone2' => $data['phone2'],
                    'address' => $data['address'],
                    'industry_type' => $data['industry_type'],
                    'client_id' =>  $unique_id,
                    'website' => $data['website'],
                    'company_profile' => $data['company_profile'],
                    'company_name' => $data['company_name'],
                    'policies' => $data['policies'],
                ]);
                $this->dispatch(new RegistrationSuccessfullJob($user));
                $sendMsg->registrationSuccessText($data['name'], $data['phone1']);
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