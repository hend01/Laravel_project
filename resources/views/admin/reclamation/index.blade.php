
@extends('admin.theme')

@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reclamation</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
        </div>
        <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
            <span style="margin-left: 11px;"> Liste des Réclamations </span>
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sujet</th>
                            <th>Description</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reclamations as $reclamation)
                            <tr>
                                <td>{{ $reclamation->sujet }}</td>
                                <td>{{ $reclamation->description }}</td>
                                <td>
                                    <form method="post" action="{{ route('reclamations.destroy', $reclamation->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="flex items-center justify-center text-danger">
                                            <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @if ($reclamation->reponses->count() > 0)
                                    <a href="{{ route('admin.reponses.show', $reclamation->reponses->first()->id) }}" class="flex items-center justify-center">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Voir la Réponse
                                        </a>
                                    @else
                                        <a href="{{ route('admin.reponse.create', ['reclamation_id' => $reclamation->id]) }}" class="flex items-center justify-center">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Répondre
                                        </a>
                                    @endif
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('reclamations.export.excel') }}" class="btn btn-info">
                    <i data-lucide="sheet"></i>Excel
                </a>
                <a href="{{ route('reclamations.export.pdf') }}" class="btn btn-primary">
                    <i data-lucide="file-text"></i>PDF
                </a>
            </div>
        </div>
    @endsection
