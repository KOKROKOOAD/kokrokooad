@extends('layouts.app')
@section('styles')

    @include('includes.links')
@endsection



@section('content')
    @include('Registration.home')
<!-- about us start -->
<section id="about-us4">

    <!-- about-us-1 start -->
    <div id="about-us-1" class="" style="padding-bottom:50px;">
        <div class="container">
                <form id="personal-account-form" action="{{route('register')}}" method="post">
                    @csrf
                    <input type="hidden" name="account" value="personal">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="outer-bound">
                                <div class=" vertical-heading">
                                    <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">Personal Informations</h2><hr>
                                </div><br><br>
                                <div class="col-sm-offset-2">
                                    <div class="right-section" id="form-elements">


                                        <div class="row">
                                            <div class="col-md-12 center"><div id="result"></div> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Industrial type<span class="required">*</span></label>
                                                    <input type="text" class="form-control"  required="required"  name="industry_type" value="{{old('industry_type')}}">
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('industry_type'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('industry_type') }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-groupform-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Job Title<span class="required">*</span></label>
                                                    <input type="text" class="form-control" required="required"  name="title" value="{{old('title')}}">
                                                    @if ($errors->has('title'))
                                                        <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('title') }}</span>
                                                    @endif

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-sm-8">
                                                <div class="form-groupform-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Address<span class="required">*</span></label>
                                                    <textarea class="form-control"  required="required"  name="address">{{old('address')}}</textarea>
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('address'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('address') }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                                {{--<button type="submit" class="btn button" id="submit_btn">Submit</button>--}}

                                            </div>

                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
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
                                            <div class="col-sm-4">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Full name<span class="required">*</span></label>
                                                    <input type="text" class="form-control"  required="required"  name="name" value="{{ old('name') }}">
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('name'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('name') }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-groupform-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Email<span class="required">*</span></label>
                                                    <input type="email" class="form-control" required="required"  name="email" value="{{old('email')}}">
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('email'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('email')  }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-groupform-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Phone no. 1<span class="required">*</span></label>
                                                    <input type="text" class="form-control"  required="required"  name="phone1" value="{{old('phone1')}}">
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('phone1'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('phone1') }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-groupform-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Phone no. 2</label>
                                                    <input type="text" class="form-control"  required="required"  name="phone2" {{old('phone2')}}>
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('phone2'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('phone2') }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="password">Password<span class="required">*</span></label>
                                                    <input type="password" class="form-control"  required="required" id="password"  name="password">
                                                    <span class="agileits_grid">
                                                    @if ($errors->has('password'))
                                                            <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('password') }}</span>
                                                        @endif
							                       </span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-groupform-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Re-type Password<span class="required">*</span></label>
                                                    <input type="password" class="form-control"  required="required"  name="password_confirmation">

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="text-danger animated fadeIn" role="alert">{{ $errors->first('password_confirmation') }}</span>
                                                    @endif

                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00">Submit</button>
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