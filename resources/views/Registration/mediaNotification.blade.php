@extends('layouts.app')

@section('styles')

   @include('includes.links')
   <nav class="navbar navbar-fixed-top yellow " style="background: transparent">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('welcome')}}"><img src="/images/kokro-yellow.png"  alt="kokrokooad.com"></a>
        </div>
        <div class="container">
           
        </div>
    </div>
</nav>

<section id="about-us">

    <div id="about-us-1" class="big-padding">
        <div class="container">
             <div class="row text-center">
                <h2 class="big-text">ADVERTISING <strong>MEDIA OUTLET </strong>REGISTRATION</h> 
             </div>
             <hr>
            <div class="row">
                 <div class="col-sm-3"></div>

                <div class="col-sm-6" style="padding-top:20px;">
                        <p style='line-height:22px;'>
                            Okrokoo is popularly considered in the African
                            traditional culture as the early morning cry of the cock to township
                            folks as a means of announcing and advertising the break of a new dawn.
                            In the spirit of this, Kokrokoo Advertising Partners sought out to replicate the consistency
                            and timely projection of advertisements to a wider range of audience with the adoption of
                            technological advancements.
                        </p>

                      <h5 style="padding-top:40px;text-align:center;">ADVERTISING MEDIA OUTLET SERVICES</h5><br>
                      <p style='font-size:15px;'> <i class="fa fa-tv"> </i> <strong>TV</strong></p><br>
                      <p style="line-height:20px;padding-bottom:20px;">
                          The KOKROKOO services offers its platform to the different kinds
                           of TV Broadcast systems namely, Analogue Terrestrial TV, Digital Satellite TV, Cable TV
                            and new technologies such as Pay-per-view, Web TV etc.

                      </p>

                      <p style='font-size:15px;'> <i class="fa fa-radio"> </i> <strong>Radio</strong></p><br>
                      <p style="line-height:20px;padding-bottom:20px;">
                          Radio stations benefit from our services as well. From FM, AM to online radio.
                           Our system accommodates all of the listed radio transmission systems

                      </p>

                      <p style='font-size:15px;'> <i class="fa fa-print"> </i> <strong>Print</strong></p><br>
                      <p style="line-height:20px;">
                          The KOKROKOO platform also houses the print media outlets, ranging from Newspapers to Magazines.

                      </p>
                      
                      <div class="row" style="padding-top:40px;text-align:center;">
                          <div class="col-sm-6">
                              <a href="{{route('welcome')}}" role="button" class="btn btn-primary">Go back</a>
                          </div>
                          <div class="col-sm-6">
                              <a href="{{route('register.media')}}" role="button" class="btn btn-success">Register</a>
                          </div>
                              
                      </div>
                    
                    
                </div>
               {{--  <div class="col-sm-6 wow slideInRight">
                    <div class="right-section">
                        <h3 style="color: #E6AA00">Who we are</h3><hr>
                        <p>okrokoo is popularly considered in the African
                            traditional culture as the early morning cry of the cock to township
                            folks as a means of announcing and advertising the break of a new dawn.
                            In the spirit of this, Kokrokoo Advertising Partners sought out to replicate the consistency
                            and timely projection of advertisements to a wider range of audience with the adoption of
                            technological advancements.
                        </p>
                        <p>
                            Developing on the above understanding, Kokrokoo Advertising Partners is
                            a well-approved and widely accepted advertising entity by world-class institutions
                            and marketers. Kokrokoo has developed its unique concept into its corporate mission
                            of bridging the gap between Marketers and Advertising Media Houses. With the introduction
                            of our highly secure website www.kokrokoo.com, all marketers, individuals, and businesses have
                            been presented with a more efficient advertisement medium for sampling and dissemination of wide-reaching
                            information directly to the Media houses.
                        </p>
                    </div>
                </div> --}}
                <div class="col-sm-3">
                </div>
            </div>
           {{--  <div class="row">
                <div class="col-xs-12 wow fadeInUp" data-wow-duration="2s">
                    <div class="bottom-section">
                        <img src="images/site-logo.png" alt="about-us-bg" class="img-responsive">
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
