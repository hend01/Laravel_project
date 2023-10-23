@extends('front.theme')

@section('content')
 <!-- Breadcrumb -->
 <section class="theme-breadcrumb pad-50">
    <div class="theme-container container ">
        <div class="row">
            <div class="col-sm-8 pull-left">
                <div class="title-wrap">
                    <h2 class="section-title no-margin"> Reclamation</h2>
                    <p class="fs-16 no-margin"> Votre message personnalisé ici </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Breadcrumb -->

<section class="contact-page pad-30">
    <div class="theme-container container">
        <div class="col-md-10 col-sm-6 col-md-offset-1 contact-form">
            <div class="calculate-form">
                <form class="row" action="{{ route('reclamations.store') }}" method="POST" id="contact-form">
                    @csrf
                    <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                        <div class="col-sm-3">
                            <label class="title-2">Sujet:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="sujet" id="sujet" required placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                        <div class="col-sm-3">
                            <label class="title-2">Description:</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="description" required cols="25" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                        <div class="col-sm-9 col-xs-12 pull-right">
                            <button type="submit" name="submit" id="submit_btn" class="btn-1">Ajouter Réclamation</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="theme-container container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
