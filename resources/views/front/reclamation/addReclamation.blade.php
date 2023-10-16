@extends('front.theme')

@section('content')

<section class="pad-50 feature feature-2 clrbg-before">
    <div class="theme-container container">
        <div class="row">
            <div class="col-sm-4">
                <img alt="" src="assets/img/icons/icon-2.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" />
                <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                    <h2 class="title-1">Fast delivery</h2>
                    <p>Duis autem vel eum iriure dolor</p>
                </div>
            </div>
            <div class="col-sm-4">
                <img alt="" src="assets/img/icons/icon-3.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" />
                <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                    <h2 class="title-1">secured service</h2>
                    <p>Duis autem vel eum iriure dolor in hendrerit</p>
                </div>
            </div>
            <div class="col-sm-4">
                <img alt="" src="assets/img/icons/icon-4.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" />
                <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                    <h2 class="title-1">worldwide shipping</h2>
                    <p>Eum iriure dolor in hendrerit in vulputa</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Feature-2 -->

<!-- Ajoutez ici votre formulaire de réclamation -->
<div class="theme-container container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter une Réclamation</div>
                <div class="panel-body">
                    <form action="{{ route('reclamations.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="sujet">Sujet :</label>
                            <input type="text" name="sujet" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter Réclamation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
