@extends('layouts.dashboard')

@section('dashboard')

              {{--<ad-summary></ad-summary>--}}
              <cart></cart>
              <p>
              {{--<router-link to="/user-account/create-sub-file" role="button" type="button" class="btn btn-mat btn-inverse ">Next</router-link>--}}
              </p>

              <router-view></router-view>


@endsection

