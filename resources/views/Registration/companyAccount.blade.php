@extends('layouts.app')
@section('styles')

    @include('includes.links')
@endsection

@section('content')
    @include('Registration.home')

<!-- about us start -->
<section id="contact-us7">

    <!-- about-us-1 start -->
    <div id="contact-us-1" class="" style="padding-bottom:50px;">

        <div class="container">
            <form  action="{{route('register')}}" method="post" enctype="multipart/form-data" id="company-form">
                @csrf
                <input type="hidden" name="account" value="company">
            <div class="row">
                <div class="col-sm-12 wow fadeIn">
                    <div class="outer-bound">
                        <div class=" vertical-heading">
                            <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">Company Informations</h2><hr>
                        </div><br><br>
                        <div class="col-sm-offset-2">
                            <div class="right-section" id="form-elements">
                                    <div class="row">
                                        <div class="col-md-12 center"><div id="result"></div> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                                                <label for="company_name">Company name<span class="required">*</span></label>
                                                <input type="text" class="form-control"   id="company_name" name="company_name" value="{{old('company_name')}}" required>
                                                 <span class="text-danger"></span>
                                                @if ($errors->has('company_name'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                       {{ $errors->first('company_name') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label>Job Title<span class="required">*</span></label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                      {{ $errors->first('title') }}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                                <label>Website<span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="website"  id="website" name="website" value="{{old('website')}}" required>
                                                @if ($errors->has('website'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                  {{ $errors->first('website') }}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('industry_type') ? ' has-error' : '' }}">
                                                <label>Industrial type<span class="required">*</span></label>
                                                <input type="text" class="form-control"  id="industry_type" name="industry_type" value="{{old('website')}}" required>
                                                @if ($errors->has('industry_type'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                    {{ $errors->first('industry_type') }}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                         <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                 <label>Address<span class="required">*</span></label>
                                                 <textarea class="form-control"  id="address" name="address" required>{{old('address')}}</textarea>
                                                 @if ($errors->has('address'))
                                                     <span class="text-danger animated fadeIn" role="alert">
                                                    {{ $errors->first('address') }}
                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('company_profile') ? ' has-error' : '' }}">
                                                 <label>Profile<span class="required">*</span></label>
                                                 <textarea class="form-control"   id="company_profile"  name="company_profile" required>{{old('company_profile')}}</textarea>
                                                 @if ($errors->has('company_profile'))
                                                     <span class="text-danger animated fadeIn" role="alert">
                                                        {{ $errors->first('company_profile') }}
                                                 </span>
                                                 @endif
                                             </div>
                                         </div>
                                     </div>
                                       <div class="row">
                                           <div class="col-sm-6">
                                               <div class="form-group{{ $errors->has('policies') ? ' has-error' : '' }}">
                                                   <label>Policy<span class="required">*</span></label>
                                                   <textarea class="form-control"   id="policies" name="policies">{{old('policies')}}</textarea>
                                                   @if ($errors->has('policies'))
                                                       <span class="text-danger animated fadeIn" role="alert">
                                                           {{ $errors->first('policies') }}
                                                        </span>
                                                   @endif
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                                   <label for="logo">Upload logo <span class="required">*</span></label>
                                                   <input type="file" accept="image/*" data-max-size='32k' data-type='image'  class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}"  id="logo" name="logo" value="{{old('logo')}}">
                                                   @if ($errors->has('logo'))
                                                       <span class="text-danger animated fadeIn" role="alert">
                                                           {{ $errors->first('logo') }}
                                                        </span>
                                                   @endif
                                               </div>
                                           </div>

                                       </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 wow fadeIn">
                    <div class="outer-bound">
                        <div class=" vertical-heading">
                            <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">User account Information</h2><hr>
                        </div><br><br>
                        <div class="col-sm-offset-2">
                            <div class="right-section" id="form-elements">


                                    <div class="row">
                                        <div class="col-md-12 center"><div id="result"></div> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label>Full name<span class="required">*</span></label>
                                                <input type="text" class="form-control"  id="name" name="name" value="{{old('name')}}" required>
                                                <span class="agileits_grid">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('name') }}</span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>Email<span class="required">*</span></label>
                                                <input type="email" class="form-control"  id="email" name="email" value="{{old('email')}}" required>
                                                <span class="agileits_grid">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('email') }}
                                                        </span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                                                <label for="phone1">Phone no. 1<span class="required">*</span></label>
                                                <input type="text" class="form-control"   id="phone1" name="phone1" value="{{old('phone1')}}" required>
                                                <span class="agileits_grid">
                                                    @if ($errors->has('phone1'))
                                                        <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('phone1') }}</span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                                <label for="phone2">Phone no. 2</label>
                                                <input type="text" class="form-control"  placeholder="Optional"  id="phone2" name="phone2" value="{{old('phone2')}}">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('phone2'))
                                                        <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('phone2') }}</span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                       </div>
                                         <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">Password<span class="required">*</span></label>
                                                <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
                                                <span class="agileits_grid">
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('password') }}</span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="re-pass">Re-type Password<span class="required">*</span></label>
                                                <input type="password" class="form-control"   id="re-pass" name="password_confirmation">
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                       {{ $errors->first('password_confirmation') }}
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                                            {{-- <label for="password">Password<span class="required">*</span></label> --}}
                                            <input type="checkbox" name="terms" value="true" {{ !old('terms') ?: 'checked' }}>
                                            <a href="{{route('terms')}}" target="_blank" class="text-primary">Agree with the terms and conditions</a><br>
                                            <span class="agileits_grid">
                                                    @if ($errors->has('terms'))
                                                    <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('terms') }}</span>
                                                @endif
							                       </span>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-4">
                                         <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00">Submit</button>
                                         <span style="color:#E6AA00 ">Registered?
                                         </span><a href="{{route('login')}}" class="link text-info">Login</a>
                                    </div> --}}

                                </div>


                                <div class="row">


                                    <div class="col-sm-12">
                                        <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00">Submit</button>
                                        <span style="color:#E6AA00 ">Already registered?
                                                 </span><a href="{{route('login')}}" class="link text-info">Login</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    @include('includes.scripts')
@endsection

