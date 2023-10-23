
@extends('admin.theme')

@section('content')
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Liste des Réponses
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Contenu de la Réponse</th>
                        <th>Réclamation</th>
                        <th>Actions</th>
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
</div>
@endsection
