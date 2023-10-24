@extends('front.theme')

@section('content')
 <!-- Breadcrumb -->
 <section class="theme-breadcrumb pad-50">
    <div class="theme-container container ">
        <div class="row">
            <div class="col-sm-8 pull-left">
                <div class="title-wrap">
                    <h2 class="section-title no-margin"> produits</h2>
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
                @foreach($produits as $produit)
                    <div class="card mt-5" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('pic.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{ $produit->name }}</h5>
                          <h3 class="card-title">{{ $produit->offer }}</h3>
                          <p class="card-text">{{ $produit->description }}</p>
                          <p class="card-text">{{ $produit->prix }}</p>
                          <a href="{{ url("/produit/$produit->id")}}" class="btn btn-primary" >Details</a>
                          @auth
                        @if("admin"===(auth()->user()->role))
                        <form method="POST" action="{{ url("/produit/delete/$produit->id")}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this produit?')">Delete produit</button>
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
