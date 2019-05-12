<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//==============guest routes=================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/personal-account',function (){
        return view('Registration.personalAccount');
    })->name('register.personal');

Route::get('/organization-account',function (){
    return view('Registration.companyAccount');
})->name('register.org');

Route::get('/media-account',function (){
    return view('Registration.mediaAccount');
})->name('register.media');

Route::get('/register-success',function (){
    return view('notifications.register_success');
})->name('register.success');

//==================guest routes ends here==========================


//=====================authenticated routes======================

Route::middleware(['auth'])->prefix('/user-account/')->group(function (){
    Route::get('dashboard',function (){
        return view('userDashboard.dashboard');
    })->name('dashboard');

    Route::get('active-subscription',function (){
        return view('userDashboard.activeSubscription');
    })->name('active.sub');


    Route::get('inactive-subscription',function (){
        return view('userDashboard.inactiveSubscription');
    })->name('inactive.sub');


    Route::get('pending-subscription',function (){
        return view('userDashboard.pendingSubscription');
    })->name('pend.sub');

    Route::get('transactions',function (){
        return view('userDashboard.transactions');
    })->name('transact');

    Route::get('user-profile',function (){
        return view('userDashboard.profile');
    })->name('profile');

    Route::get('subscriptions',function (){
        return view('userDashboard.myPublication');
    })->name('publication');

    Route::get('dashboard',function (){
         $media = \App\User::all('logo');
        return view('userDashboard.dashboard', ['media' => $media]);
    })->name('dashboard');



// ================subscription  routes============================
    Route::post('ads-store', 'SubController@createSub');
    Route::get('ads/media-api', 'SubController@loadMedia');
    Route::get('fetch-ads/api', 'SubController@fetchAds');
    Route::get('media-houses-api/{media}', 'SubController@fetchMediaHouse');
    Route::get('media-program-api/{mediaHouse}', 'SubController@fetchMediaProgram');
    Route::get('program-date-api/{mediaProgram}', 'SubController@fetchProgramDates');
    Route::get('fetch-segments-titles/{id}', 'SegmentController@fetchSegmentTitles');
    Route::get('fetch-segments', 'SegmentController@fetchSegments');
    Route::get('check-spots-api/{segment}', 'SegmentController@checkSpots');
    Route::post('sub-update-api', 'SubController@updateAds');
    Route::post('check-sub/api','SubController@checkIfSubExist');
    Route::get('fetch-transac/api','SubController@fetchUserTransac');
    Route::get('check-segment-api/{sub_date}','CheckSubController@checkSubAvailable');
//=======================subscriptions routes ends here=============================


    //===========================segment routs =====================================
    Route::get('fetch-media-types-api', 'SegmentController@fetchMediaTypes');
    Route::get('testme', 'SegmentController@test');
    //==========================segment routes ends here=============================

//==========================payment  routes======================================
    Route::post('api-payment','PaymentController@payment');
    //======================== payment routes ends here


    // =================vue router routes =====================================
    Route::get('{any}', function () {
        return view('userDashboard.dashboard');
    })->where('any','.*');
    //======================vue router routes ends here=============================

});

Auth::routes();


//============================authenticated routes ends here===========================







//test routes
//=============================================
//Route::get('test-api', 'SegmentController@api');
//Route::post('test-post', 'SegmentController@apiPost');
//Route::post('test-update-event', 'SegmentController@eventUpdate');
//Route::post('test-check-segment', 'SegmentController@eventCheck');



































//Route::get('/users-media-accounts', function () {
//    return view('userDashboard.users.users-media');
//})->name('users-media');


//Route::get('/all-users-accounts', function () {
//    return view('userDashboard.users.all');
//})->name('users-all');
//
//Route::get('/users-org-accounts', function () {
//    return view('userDashboard.users.organization');
//})->name('users-org');



//Route::get('/test', function () {
//    return view('userDashboard.pages.dashboard');
//})->name('userDashboard');


//
//Route::get('/ads', function () {
//    return view('userDashboard.media-house.ads.ad');
//})->name('media-ads');
//
//Route::get('/publish', function () {
//    return view('userDashboard.media-house.ads.published');
//})->name('media-publish');
//
//Route::get('/pending', function () {
//    return view('userDashboard.media-house.ads.pending');
//})->name('media-pending');
//
//Route::get('/review', function () {
//    return view('userDashboard.media-house.ads.review');
//})->name('media-review');


//email messages
//Route::get('/compose', function () {
//    return view('userDashboard.pages.messages.compose');
//})->name('email-compose');
//
//Route::get('/read', function () {
//    return view('userDashboard.pages.messages.read');
//})->name('email-read');
//
//Route::get('/inbox', function () {
//    return view('userDashboard.pages.messages.inbox');
//})->name('email-inbox');
//// sent sms
//Route::get('/create-sms', function () {
//    return view('userDashboard.pages.sms.create-sms');
//})->name('sms-compose');
//
//Route::get('/read-sms', function () {
//    return view('userDashboard.pages.sms.read');
//})->name('sms-read');
//
//Route::get('/sms-inbox', function () {
//    return view('userDashboard.pages.sms.inbox');
//})->name('sms-inbox');

// user management

// organisations ad managements
//Route::get('/org-accounts-ads', function () {
//    return view('userDashboard.organisations.ads.ad');
//})->name('org-ads');
//
//Route::get('/org-accounts-publish', function () {
//    return view('userDashboard.organisations.ads.published');
//})->name('org-publish');
//
//Route::get('/org-accounts-pending', function () {
//    return view('userDashboard.organisations.ads.pending');
//})->name('org-pending');
//
//Route::get('/org-account-review', function () {
//    return view('userDashboard.organisations.ads.review');
//})->name('org-review');

//
//Route::get('/ads/create-step1', 'AdController@createstep1');
//Route::post('/ads/create-step1', 'AdController@createstep1');
//
//Route::get('/ads/create-step2', 'AdController@createstep2');
//Route::post('/ads/create-step2','AdController@createstep2');
//
//

//Route::get('/home', 'HomeController@index')->name('home');
