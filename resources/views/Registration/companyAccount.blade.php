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
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label>Job Title<span class="required">*</span></label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('title') }}</strong>
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
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('industry_type') ? ' has-error' : '' }}">
                                                <label>Industrial type<span class="required">*</span></label>
                                                <input type="text" class="form-control"  id="industry_type" name="industry_type" value="{{old('website')}}" required>
                                                @if ($errors->has('industry_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('industry_type') }}</strong>
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
                                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('company_profile') ? ' has-error' : '' }}">
                                                 <label>Profile<span class="required">*</span></label>
                                                 <textarea class="form-control"   id="company_profile"  name="company_profile" required>{{old('company_profile')}}</textarea>
                                                 @if ($errors->has('company_profile'))
                                                     <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('company_profile') }}</strong>
                                                 </span>
                                                 @endif
                                             </div>
                                         </div>
                                     </div>
                                       <div class="row">
                                           <div class="col-sm-6">
                                               <div class="form-group{{ $errors->has('policies') ? ' has-error' : '' }}">
                                                   <label>Policy<span class="required">*</span></label>
                                                   <textarea class="form-control"   id="policies" name="policies">{{old('policies')}}</textarea required>
                                                   @if ($errors->has('policies'))
                                                       <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $errors->first('policies') }}</strong>
                                                        </span>
                                                   @endif
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                                   <label for="logo">Upload logo(Required, only .jpg,.jpeg,.png files:)<span class="required">*</span></label>
                                                   <input type="file" accept=".jpg|.jpeg|.png" data-max-size='32k' data-type='image'  class="{{ $errors->has('logo') ? ' is-invalid' : '' }}"  id="logo" name="logo" value="{{old('logo')}}">
                                                   @if ($errors->has('logo'))
                                                       <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('logo') }}</strong>
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
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
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
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
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
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone1') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                                <label for="phone2">Phone no. 2</label>
                                                <input type="text" class="form-control"   id="phone2" name="phone2" value="{{old('phone2')}}" required>
                                                <span class="agileits_grid">
                                                    @if ($errors->has('phone2'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone2') }}</strong></span>
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
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="re-pass">Re-type Password<span class="required">*</span></label>
                                                <input type="password" class="form-control"   id="re-pass" name="password_confirmation">
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn button">Submit</button>
                                <span style="color:#E6AA00 ">Already registered?
                                </span><a href="{{route('login')}}" class="link text-info">Login</a>
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

