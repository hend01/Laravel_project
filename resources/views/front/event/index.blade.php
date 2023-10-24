@extends('front.theme')

@section('content')
 <!-- Breadcrumb -->
 <section class="theme-breadcrumb pad-50">
    <div class="theme-container container ">
        <div class="row">
            <div class="col-sm-8 pull-left">
                <div class="title-wrap">
                    <h2 class="section-title no-margin"> Events</h2>
                    <p class="fs-16 no-margin"> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.Breadcrumb -->
<section class="contact-page pad-30">
    <div class="theme-container container">
        <div class="col-md-10 col-sm-6 col-md-offset-1 contact-form">
            <div class="calculate-form" style="display: grid ; grid-template-columns: repeat(3, 1fr);gap: 10px;">
              
                @foreach($events as $event)
                    <div class="card mt-5" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('pic.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{ $event->name }}</h5>
                          <h3 class="card-title">{{ $event->event_type }}</h3>
                          <p class="card-text">{{ $event->description }}</p>
                          <a href="{{ url("/event/$event->id")}}" class="btn btn-primary" >Details</a>
                          @auth
                          @if ($event->usere()===(auth()->user()->id))
                          <form method="post" action="{{ route('events.participate', $event->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Participate</button>
                        </form>
                        @else
                            <p>You have already participated in this event.</p>
                        @endif
                        @if("admin"===(auth()->user()->role))
                        <form method="POST" action="{{ url("/ev/delete/$event->id")}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>
                        </form>
                        @endif
                        @endauth
                        </div>
                      </div>
                      
                    @endforeach
            </div>
        </div>
    </div>
</section>
<div class="theme-container container">
</div>
@endsection
