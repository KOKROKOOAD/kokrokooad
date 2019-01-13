@extends('layouts.app')

@section('styles')

   @include('includes.links')
@endsection

@section('content')
    <!--Home Start -->
    @include('includes.pages.home')
    <!-- Home End -->
     <!-- about us start-->
    @include('includes.pages.about')
    <!--about us end-->
    <!--  services start -->
    @include('includes.pages.services')
    <!--  services end-->

    <!--  portfolio start-->
     @include('includes.pages.howitworks')
    <!--  portfolio end-->

    <!-- news start -->
   @include('includes.pages.news')
    <!-- news end -->

    <!-- contact us start -->
    @include('includes.pages.register')
    <!-- contact us end -->

    <!-- contact us start -->
     @include('includes.pages.contact-us')
    <!-- contact us end -->

@endsection

@section('scripts')
    @include('includes.scripts')
@endsection

@push('loader')
    @include('includes.loader')
@endpush
