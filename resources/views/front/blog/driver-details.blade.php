@extends('front.theme')
@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <!-- Content Wrapper -->
    <article>
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">
            <div class="theme-container container ">
                <div class="row">
                    <div class="col-sm-8 pull-left">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin"> Driver Details </h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb-menubar list-inline">
                            <li><a href="#" class="gray-clr">Home</a></li>
                            <li class="active">Driver Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Breadcrumb -->

        <!-- Blog -->
        <div class="theme-container container">
            <div class="row">
                <div class="blog-wrap  pt-80 pb-50 clearfix">
                    <section class="col-md-9 col-sm-8 pb-50">
                        <article class="post-wrap pb-50">
                            <div class="post-img pb-10">
                                <a href="#"> <img alt="" src="{{ asset('assets/img/driver.jpg') }}"> </a>
                            </div>
                            <div class="post-content">
                                <h6 class="title-2 fs-10">Driver</h6>
                                <a class="title-1" href="#">{{ $driver->first_name . ' ' . $driver->last_name }}</a>
                                <div class="pad-10">
                                    <h5 style="color: black">Email : {{ $driver->email }}</h5>
                                    <h5 style="color: black">Phone Number : {{ $driver->phone_nnumber }}</h5>
                                </div>
                            </div>
                        </article>
                        <form method="POST" id="evaluation-form" class="rating-form">
                            <h3>Évaluez ceci : </h3>
                            <div class="rating">
                                <i class="fa fa-star fa-2x" data-index="0"></i>
                                <i class="fa fa-star fa-2x" data-index="1"></i>
                                <i class="fa fa-star fa-2x" data-index="2"></i>
                                <i class="fa fa-star fa-2x" data-index="3"></i>
                                <i class="fa fa-star fa-2x" data-index="4"></i>
                            </div>
                            <h3 style="color: orange">Moyenne : {{ number_format($averageRating, 1) }} / 5</h3>
                            <input type="hidden" name="rating" id="rating" value="0">
                            <br>

                        </form>
                        <div class="review-form">
                            <h5 class="title-2" style="color: orange;">Add a Review</h5>
                            <form method="post">
                                @csrf
                                <textarea id="comment" class="comment-content" name="comment" placeholder="Your opinion" rows="3"></textarea>
                                <br><br>
                                <button type="button" class="btn-1" onclick="saveEvaluation()">Submit
                                    Evaluation</button>
                            </form>

                            @error('comment')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <hr>
                        <div id="success-message" class="alert alert-success" style="display: none;"></div>

                        <div id="validation-errors" class="alert alert-danger" style="display: none;"></div>

                        <div id="response-message-container"></div>
                        @if ($reviews->count() > 0)
                            <div class="comments-article">
                                <div class="pad-30">
                                    <h2 class="title-1 text-center"> {{ $reviews->count() }} Reviews </h2>
                                </div>
                                <ol class="comments-box clearfix ">
                                    <ul class="comment-list">
                                        @foreach ($reviews as $review)
                                            <li class="comment">
                                                <article class="comment-body" id="div-comment-{{ $review->id }}">
                                                    <footer>
                                                        <div class="comment-author">
                                                            <img class="avatar"
                                                                src="{{ asset('assets/img/flickr/flickr-feed.jpg') }}"
                                                                alt="avtar">
                                                            <b class="fn">{{ $review->evaluation->user->email }}</b>
                                                            <span class="says">says:</span>
                                                        </div><!-- .comment-author -->

                                                        <div class="comment-metadata">
                                                            <a href="#">
                                                                <time
                                                                    datetime="{{ $review->created_at }}">{{ $review->created_at->format('F j, Y \a\t g:i a') }}</time>
                                                            </a>
                                                        </div><!-- .comment-metadata -->
                                                    </footer><!-- .comment-meta -->

                                                    <div class="comment-content">
                                                        <p>{{ $review->commentaire }}</p>
                                                    </div><!-- .comment-content -->
                                                </article><!-- .comment-body -->
                                            </li><!-- #comment-## -->
                                            @if ($review->reponses->count() > 0)
                                                <div class="reponses">
                                                    <h5>Réponses :</h5>
                                                    <ul class="reponses-list">
                                                        @foreach ($review->reponses as $reponse)
                                                            <div class="comment-author">
                                                                <b class="fn"
                                                                    style="color:dimgray">{{ $reponse->avis->evaluation->user->email }}</b>
                                                                <span class="says">says:</span>
                                                            </div><!-- .comment-author -->
                                                            <li class="comment-content">
                                                                <p>{{ $reponse->contenu }}</p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <br><br>
                                            <!-- Formulaire pour la réponse -->
                                            <div class="comment-reply-form">
                                                <form method="post"
                                                    action="{{ route('reponse.create', ['driverId' => $review->evaluation->driver->id]) }}">
                                                    @csrf
                                                    <input type="hidden" name="review_id" value="{{ $review->id }}">
                                                    <textarea class="comment-content" style="color: black" name="reponse" placeholder="Your reply"></textarea>
                                                    <div class="reply">
                                                        <button type="submit" class="btn btn-info">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    </ul>

                                </ol>
                            @else
                                <div class="pad-30">
                                    <h5 class="title-2 text-center">No reviews available for this driver at the moment.
                                    </h5>
                                    <p></p>
                                </div>
                        @endif
                        <!-- Review Submission Form -->

                    </section>
                </div>
            </div>
        </div>
        <!-- /.Blog -->

    </article>
    <!-- /.Content Wrapper -->

    <div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>

                </div>
                <div class="modal-body">
                    Are you sure you want to submit this evaluation without a review ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideModal()">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitEvaluation()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    </div>


    <script>
        function hideModal() {
            $('#confirmationModal').modal('hide'); // Close the confirmation modal
        }

        function saveEvaluation() {
            var comment = $('#comment').val().trim();
            if (comment === '') {
                // Open the confirmation modal
                $('#confirmationModal').modal('show');
            } else {
                submitEvaluationAndAvis()
            }
        }
        var driverId = {{ $driverId }};

        function submitEvaluation() {
            // This function is called when the user confirms the submission
            $('#confirmationModal').modal('hide'); // Close the confirmation modal
            $.ajax({
                url: '{{ route('evaluations.add', ['driverId' => $driverId]) }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rating: ratedIndex,
                    driverId: driverId,

                },
                dataType: 'json',
                success: function(response) {
                    // Si la soumission est réussie, affichez le message de succès
                    var successMessage = document.getElementById("success-message");
                    successMessage.innerText = response.message;
                    successMessage.style.display = "block";

                    // Cachez les erreurs de validation
                    $('#validation-errors').hide();
                },
                error: function(xhr, status, error) {
                    var errorMessage = document.createElement("div");
                    errorMessage.innerText = "An error occurred: " + error;
                    errorMessage.classList.add("error-message");
                    document.getElementById("response-message-container").appendChild(errorMessage);
                }
            });
        }

        function submitEvaluationAndAvis() {
            localStorage.setItem('driverId', driverId);

            // This function is called when the user confirms the submission
            $('#confirmationModal').modal('hide'); // Close the confirmation modal
            $.ajax({
                url: '/add-evaluation-and-avis/' + driverId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rating: ratedIndex,
                    driverId: driverId,
                    comment: $('#comment').val().trim()
                },
                dataType: 'json',
                success: function(response) {
                    // Si la soumission est réussie, affichez le message de succès
                    var successMessage = document.getElementById("success-message");
                    successMessage.innerText = response.message;
                    successMessage.style.display = "block";

                    // Cachez les erreurs de validation
                    $('#validation-errors').hide();
                },
                error: function(xhr, status, error) {
                    // Si une erreur se produit, traitez les erreurs de validation
                    var errors = xhr.responseJSON.errors;
                    var errorText = "Erreurs de validation :<br>";

                    for (var key in errors) {
                        errorText += errors[key][0] + "<br>";
                    }

                    $('#validation-errors').html(errorText);
                    $('#validation-errors').show();
                }
            });
        }

        var ratedIndex = -1;


        $(document).ready(function() {
            resetStarColors();
            $('.fa-star').on('click', function() {
                ratedIndex = parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex', ratedIndex);
                saveEvaluation()
            });

            $('.fa-star').mouseover(function() {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function() {
                resetStarColors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });



        function setStars(max) {
            for (var i = 0; i <= max; i++) {
                $('.fa-star:eq(' + i + ')').css('color', 'orange');
            }
        }

        function resetStarColors() {
            // Réinitialisez la couleur de toutes les étoiles à noire
            $('.fa-star').css('color', 'black');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
