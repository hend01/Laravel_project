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
                                <a href="#"> <img alt="" src="assets/img/background/banner-1.jpg"> </a>
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
                            <h3>Évaluez ceci :</h3>
                            <div class="rating">
                                <i class="fa fa-star fa-2x" data-index="0"></i>
                                <i class="fa fa-star fa-2x" data-index="1"></i>
                                <i class="fa fa-star fa-2x" data-index="2"></i>
                                <i class="fa fa-star fa-2x" data-index="3"></i>
                                <i class="fa fa-star fa-2x" data-index="4"></i>
                            </div>
                            <input type="hidden" name="rating" id="rating" value="0">
                            <br>
                            <button type="button" class="btn-1" onclick="saveToTheDB()">Envoyer</button>
                        </form>

                        <div id="response-message-container"></div>

                        <div class="comments-article">
                            <div class="pad-30">
                                <h2 class="title-1 text-center"> 1 Comment </h2>
                            </div>
                            <ol class="comments-box clearfix ">
                                <li class="comment">
                                    <article class="comment-body" id="div-comment-5">
                                        <footer>
                                            <div class="comment-author">
                                                <img class="avatar" src="assets/img/flickr/flickr-feed.jpg" alt="avtar">
                                                <b class="fn">admin</b> <span class="says">says:</span>
                                            </div><!-- .comment-author -->

                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <time datetime="2015-01-19T09:37:32+00:00"> January 19, 2015 at 9:37 am
                                                    </time>
                                                </a>
                                            </div><!-- .comment-metadata -->

                                        </footer><!-- .comment-meta -->

                                        <div class="comment-content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </p>
                                        </div><!-- .comment-content -->

                                        <div class="reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </article><!-- .comment-body -->
                                    <ol class="children">
                                        <li>
                                            <article class="comment-body">
                                                <footer>
                                                    <div class="comment-author">
                                                        <img class="avatar" src="assets/img/flickr/flickr-feed.jpg"
                                                            alt="avtar">
                                                        <b class="fn">John Doe</b> <span class="says">says:</span>
                                                    </div>
                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <time datetime="2007-09-04T10:49:03+00:00">
                                                                September 4, 2007 at 10:49 am
                                                            </time>
                                                        </a>
                                                        <span><a href="#">Edit</a></span>
                                                    </div>
                                                </footer>
                                                <div class="comment-content">
                                                    <p>Contributor comment.</p>
                                                </div>
                                                <div class="reply">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </article>
                                            <ol class="children">
                                                <li>
                                                    <article class="comment-body">
                                                        <footer>
                                                            <div class="comment-author">
                                                                <img class="avatar" src="assets/img/flickr/flickr-feed.jpg"
                                                                    alt="avtar">
                                                                <b class="fn">John Doe</b> <span
                                                                    class="says">says:</span>
                                                            </div>
                                                            <div class="comment-metadata">
                                                                <a href="#">
                                                                    <time datetime="2007-09-04T10:49:03+00:00">
                                                                        September 4, 2007 at 10:49 am
                                                                    </time>
                                                                </a>
                                                                <span><a href="#">Edit</a></span>
                                                            </div>
                                                        </footer>
                                                        <div class="comment-content">
                                                            <p>Contributor comment.</p>
                                                        </div>
                                                        <div class="reply">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </article>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </li><!-- #comment-## -->
                            </ol>


                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- /.Blog -->

    </article>
    <!-- /.Content Wrapper -->

    <script>
        var ratedIndex = -1;


        $(document).ready(function() {
            resetStarColors();
            $('.fa-star').on('click', function() {
                ratedIndex = parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex', ratedIndex);
                //saveToTheDB();
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

        function saveToTheDB() {
            $.ajax({
                url: '/store-evaluation', // L'URL doit correspondre à la route de sauvegarde des évaluations dans Laravel
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Vous devez inclure un jeton CSRF
                    rating: ratedIndex, // Récupère la valeur de la notation
                    // Autres données à envoyer, si nécessaire
                },
                dataType: 'json',
                success: function(response) {
                    // Ajoutez un élément HTML pour afficher le message de succès
                    var successMessage = document.createElement("div");
                    successMessage.innerText = response.message;
                    successMessage.classList.add("success-message"); // Ajoutez une classe CSS si nécessaire

                    // Ajoutez le message au conteneur souhaité dans votre page
                    document.getElementById("response-message-container").appendChild(successMessage);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    console.log('Response:', xhr.responseText);
                }
            });
        }

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
@endsection
