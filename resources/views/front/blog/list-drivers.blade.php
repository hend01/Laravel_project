@extends('front.theme')
@section('content')
    <!-- More About Us -->
    <section class="pad-30 more-about-wrap">
        <div class="theme-container container pb-100">
            <div class="row">
                @foreach ($drivers as $driver)
                    <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        
                            <div class="more-about clrbg-before">
                            <div class="post-img pb-10">
                                <a href="/driver/details/{{$driver->id}}"> <img alt="" src="{{ asset('assets/img/driver.jpg') }}"> </a>
                            </div>
                            <a  href="/driver/details/{{$driver->id}}"><h2 class="title-1">{{ $driver->first_name . ' ' . $driver->last_name }}</h2></a>
                            <div class="pad-10"></div>
                            <a  href="/driver/details/{{$driver->id}}"><p>Email : {{ $driver->email }}</p></a>
                            <a  href="/driver/details/{{$driver->id}}"><p>Phone Number : {{ $driver->phone_number }}</p></a>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /.More About Us -->
@endsection
