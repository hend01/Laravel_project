@extends('front.theme')

@section('content')
<article>
    <div class="content">

        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">
            <div class="theme-container container ">
                <div class="row">
                    <div class="col-sm-8 pull-left">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">Mes Réclamations</h2>
                            <p class="fs-16 no-margin">Consultez vos réclamations et leur statut</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Breadcrumb -->

        <!-- Réclamations -->
        <section class="pt-50 pb-120 tracking-wrap">
            <div class="theme-container container">
                <div class="col-md-10 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
                    <div class="prod-info white-clr">
                        <ul>
                            @isset($reclamations)
                                @if ($reclamations->isEmpty())
                                    <li>Vous n'avez aucune réclamation pour le moment.</li>
                                @else
                                    @foreach ($reclamations as $reclamation)
                                        <li>
                                            <span class="title-2">Sujet :</span>
                                            <span class="fs-16">{{ $reclamation->sujet }}</span>
                                        </li>
                                        <li>
                                            <span class="title-2">Description :</span>
                                            <span class="fs-16">{{ $reclamation->description }}</span>
                                        </li>
                                        <li>
                                            <span class="title-2">Réponses :</span>
                                            @if ($reclamation->reponses->isEmpty())
                                                <span class="fs-16 theme-clr">Pas encore de réponse.</span>
                                            @else

                                            <span class="title-2">
                                                  @foreach ($reclamation->reponses as $reponse)
                                                            <tr>
                                                                <td>{{ $reponse->contenu }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </span>
                                            @endif
                                        </li>
                                        <li>
                                            <form action="{{ route('reclamations.destroyfront', $reclamation->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >Supprimer la Réclamation</button>
                                            </form>
                                        </li>
                                    @endforeach
                                @endif
                            @else
                                <li>Impossible de charger les réclamations pour le moment.</li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Réclamations -->

    </div>
</article>
<!-- /.Content Wrapper -->
@endsection
