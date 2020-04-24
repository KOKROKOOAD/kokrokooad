@extends('layouts.app')

@section('styles')

    @include('includes.links')
@endsection


@section('content')
    @include('Registration.home')

<!-- about us start -->
<section id="services5">

    <!-- about-us-1 start -->
    <div id="service-1" class="" style="padding-bottom:50px;">
        <div class="container">
            <form method="post" id="register"  action="{{route('register')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="account" value="MEDIA">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <div class="outer-bound">
                            <div class=" vertical-heading">
                                <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">Media House Informations</h2><hr>
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
                                                <input type="text" required class="form-control"  id="company_name" name="company_name" value="{{old('company_name')}}">
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
                                                <input type="text" class="form-control" required  id="title" name="title" value="{{old('title')}}">
                                                <span class="text-danger"></span>
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
                                                <input type="text" class="form-control" required   id="website" name="website" value="{{old('website')}}">
                                                @if ($errors->has('website'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                  {{ $errors->first('website') }}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('media_type') ? ' has-error' : '' }}">
                                                <label>Media type<span class="required">*</span></label>

                                                {{--<input type="text" class="form-control{{ $errors->has('industry_type') ? ' is-invalid' : '' }}" placeholder="Radio"  id="industry_type" name="industry_type" value="{{old('website')}}">--}}
                                                <select name="media_type" class="form-control" required>
                                                    <option disabled="" selected="">- Select media type-</option>
                                                    <option value="Radio" {{old("media_type") == "Radio" ? "selected" : ""}}>Radio</option>
                                                    <option value="TV">TV</option>
                                                    <option value="Print">Print</option>
                                                </select>
                                                @if ($errors->has('media_type'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                    {{ $errors->first('media_type') }}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Address<span class="required">*</span></label>
                                                <textarea class="form-control"  required  id="address" name="address">{{old('address')}}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                        {{ $errors->first('address') }}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('company_profile') ? ' has-error' : '' }}">
                                                <label>Media Profile<span class="required">*</span></label>
                                                <textarea class="form-control"  required  id="company_profile"  name="company_profile">{{old('company_profile')}}</textarea>
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

                                            <div class="form-group{{ $errors->has('industry_type') ? ' has-error' : '' }}">
                                                <label>Industry type<span class="required">*</span></label>
                                                <input class="form-control" required   id="industry_type" name="industry_type" {{old('industry_type')}}>
                                                @if ($errors->has('industry_type'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                       {{ $errors->first('industry_type') }}
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('media_house') ? ' has-error' : '' }}">
                                                <label>Media house<span class="required">*</span></label>
                                                <input type="text" class="form-control" required placeholder="-GTV-"  id="media_house" name="media_house" value="{{old('media_house')}}">
                                                @if ($errors->has('media_house'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                       {{ $errors->first('media_house') }}
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('policies') ? ' has-error' : '' }}">
                                                <label>Media Policy<span class="required">*</span></label>
                                                <textarea class="form-control" required placeholder="Share your policies"  id="policies" name="policies">{{old('policies')}}</textarea>
                                                @if ($errors->has('policies'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                       {{ $errors->first('policies') }}
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                                                <label for="logo">Upload logo<span class="required">*</span></label>
                                                <input type="file"  required  class="form-control"  id="logo" name="file" value="{{old('file')}}">
                                                @if ($errors->has('file'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                          {{ $errors->first('file') }}
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
                                                <input type="text" required class="form-control"   name="name" value="{{old('name')}}">
                                                    @if ($errors->has('name'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('name') }}</span>
                                                    @endif
							                       
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>Email<span class="required">*</span></label>
                                                <input type="email" required class="form-control"   name="email" value="{{old('email')}}">
                                               
                                                    @if ($errors->has('email'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('email') }}</span>
                                                    @endif
							                       
                                            </div>
                                        </div>
                                    </div>
                                       <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                                                <label>Phone no. 1<span class="required">*</span></label>
                                                <input type="text" required class="form-control"    name="phone1" value="{{old('phone1')}}">
                                          
                                                    @if ($errors->has('phone1'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('phone1') }}</span>
                                                    @endif
							                     
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                                <label>Phone no. 2</label>
                                                <input type="text" class="form-control"   placeholder="Optional"    name="phone2" value="{{old('phone2')}}">
                                               
                                                    @if ($errors->has('phone2'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('phone2') }}</span>
                                                    @endif
							                    
                                            </div>
                                        </div>
                                       </div>
                                          <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label>Password<span class="required">*</span></label>
                                                <input type="password" class="form-control"    name="password" required>
                                              
                                                    @if ($errors->has('password'))
                                                    <span class="text-danger animated fadeIn" role="alert">
                                                            {{ $errors->first('password') }}
                                                        </span>
                                                    @endif
							                       
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Re-type Password<span class="required">*</span></label>
                                                <input type="password" class="form-control"   name="password_confirmation" required>
                                            </div>
                                        </div>

                                    </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                                            {{-- <label for="password">Password<span class="required">*</span></label> --}}
                                            <input type="checkbox" name="terms" value="true" {{ !old('terms') ?: 'checked' }}>
                                            <a href="{{route('terms')}}" target="_blank" class="text-primary">Agree with the terms and conditions</a>
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
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                                            {{-- <label for="password">Password<span class="required">*</span></label> --}}
                                            <input type="checkbox" name="terms" value="true" {{ !old('terms') ?: 'checked' }}>
                                            <a href="{{route('terms')}}" target="_blank" class="text-primary">Agree with the terms and conditions</a>
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
