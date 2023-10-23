@extends('front.theme')

@section('content')
<div class="theme-container container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter une Réclamation</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('reclamations.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="sujet">Sujet :</label>
                            <input type="text" name="sujet" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" class="form-control" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter Réclamation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="theme-container container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
