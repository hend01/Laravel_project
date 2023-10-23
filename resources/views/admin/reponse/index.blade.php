@extends('admin.theme')

@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reponses</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
        </div>
        <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
            <span style="margin-left: 11px;"> Liste des Réponses </span>
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Contenu de la Réponse</th>
                            <th>Réclamation</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reponses as $reponse)
                            <tr>
                                <td>{{ $reponse->contenu }}</td>
                                <td>{{ $reponse->reclamation->sujet }}</td>
                                <td>
                                    <form method="post" action="{{ route('reponses.destroy', $reponse->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="flex items-center justify-center text-danger">
                                            <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.reponses.edit', $reponse->id) }}" class="flex items-center justify-center">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Modifier
                                    </a>
                                    <a href="{{ route('admin.reponses.show', $reponse->id) }}" class="flex items-center justify-center text-success">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Détailler
                                    </a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
