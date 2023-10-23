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
                            <h2 class="section-title no-margin"> lorem quis </h2>
                            <p class="fs-16 no-margin"> Track your product & see the current condition </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb-menubar list-inline">
                            <li><a href="#" class="gray-clr">Home</a></li>
                            <li class="active">Single Posts</li>
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
                                <a href="#"> <img alt=""
                                        src="{{ asset('assets/img/background/banner-1.jpg') }}"> </a>
                            </div>
                            <div class="post-content">
                                <h6 class="title-2 fs-10">Photography</h6>
                                <a class="title-1" href="#">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                                    consequat.</a>
                                <div class="pad-10">
                                    <span class="black-clr">
                                        Posted on
                                        <span>17th</span>
                                        <span>May</span>
                                        <span>2014</span>
                                    </span>
                                    <span class="pull-right">
                                        <a href="#"> <i class="fa fa-comment"></i> 12</a>
                                    </span>
                                </div>
                                <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non
                                    mauris vitae erat
                                    consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia
                                    nostra.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore
                                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                    ullamcorper suscipit lobortis
                                    nisl ut aliquip.</p>
                            </div>
                            <div class="post-footer">
                                <span class="post-readmore">
                                    <a class="font2-title1 fs-12" href="single-blog.html">Read more <span
                                            class="arrow_right fs-20"></span> </a>
                                </span>
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
                                                            <b class="fn">{{ $review->evaluation_id }}</b> <span
                                                                class="says">says:</span>
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
                        <div class="review-form">
                            <h5 class="title-2"style="color: orange;">Add a Review</h5>
                            <form method="post">
                                @csrf
                                <textarea id="comment" class="comment-content" placeholder="Your opinion" rows="3"></textarea>
                                <br><br>
                                <button type="button" class="btn-1" onclick="saveEvaluation()">Submit Evaluation</button>
                            </form>
                        </div>

                </div>
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
                    // Handle the success response
                    var successMessage = document.createElement("div");
                    successMessage.innerText = response.message;
                    successMessage.classList.add("success-message");
                    document.getElementById("response-message-container").appendChild(successMessage);

                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    console.log('Response:', xhr.responseText);
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
                    // Handle the success response
                    var successMessage = document.createElement("div");
                    successMessage.innerText = response.message;
                    successMessage.classList.add("success-message");
                    document.getElementById("response-message-container").appendChild(successMessage);
                    if (response.message === 'Evaluation saved successfully') {
                        window.location.href = '{{ route('blog.driverReviews', ['driverId' => $driverId]) }}';
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    console.log('Response:', xhr.responseText);
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
