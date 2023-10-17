@extends('admin.theme')

@section('content')
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Détails de la Réponse
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="intro-y box p-5">
                <p><strong>Contenu de la Réponse:</strong> {{ $reponse->contenu }}</p>
                <p><strong>Réclamation associée:</strong> {{ $reponse->reclamation->sujet }}</p>
                <p>{{ $reponse->reclamation->description }}</p>

                <a href="{{ route('admin.reponses.index') }}" class="btn btn-primary mt-4">
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
