@extends('admin.theme')

@section('content')
<div class="content">
    <div class="intro-y grid grid-cols gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <h2 class="font-medium text-lg text-gray-900">Détails de la Réponse</h2>
                </div>
                <div class="mb-3">
                    <strong class="text-gray-600">Contenu de la Réponse:</strong>
                    <p class="ml-2">
                        <a href="#" class="underline decoration-dotted">{{ $reponse->contenu }}</a>
                    </p>
                </div>
                <div class="mb-3">
                    <strong class="text-gray-600">Réclamation associée :</strong>
                    <p class="ml-2">{{ $reponse->reclamation->sujet }}</p>
                </div>
                <div class="mb-3">
                    <strong class="text-gray-600">Utilisateur associée :</strong>
                    <p class="ml-2">nom : {{ $reponse->reclamation->user->name }}  </p>
                    <p class="ml-2">email : {{ $reponse->reclamation->user->email }} </p>

                </div>
                <div class="mb-3">
                    <strong class="text-gray-600">Description :</strong>
                    <p class="ml-2">{{ $reponse->reclamation->description }}</p>
                </div>
                <div class="mb-3">
                    <strong class="text-gray-600">Created At :</strong>
                    <span class="bg-success/20 text-success rounded px-2 ml-1">{{ $reponse->reclamation->created_at }}</span>
                </div>
                <div class="mb-3">
                    <strong class="text-gray-600">Updated At :</strong>
                    <span class="bg-success/20 text-success rounded px-2 ml-1">{{ $reponse->reclamation->updated_at }}</span>
                </div>
                <a href="javascript:history.back()" class="btn btn-info mt-4">
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
