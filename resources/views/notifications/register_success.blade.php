@extends('layouts.app')
@section('styles')

    @include('includes.links')
@endsection
@section('content')
<section>
    <div class="jumbotron text-center">

        <h1 style="margin-top: 120px;font-family: Raleway, sans-serif;font-weight: 800">Thank you!</h1><br>
                    <p><strong class="text-muted">Your registration was successful</strong>.We will send you an email to confirm activation of your account within 24hrs.</p><hr>
                    <p class="lead">
                     <a class="btn btn-primary btn-lg" href="{{route('welcome')}}" role="button">Continue to homepage</a>
                    </p>
                </div>
</section>
@endsection

@section('scripts')
    @include('includes.scripts')
@endsection