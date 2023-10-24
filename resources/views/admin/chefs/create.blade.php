@extends('admin.theme')

@section('content')
    <div class="content">
        <div class="top-bar">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                </ol>
            </nav>
            <!-- Search and Notifications can go here if needed -->
        </div>
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color: #1e40af; color: white; border-radius: 8px;">
            <span style="margin-left: 11px;"> Ajouter un Chef </span>
        </h2>
        <div class="grid grid-cols gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- Chef Form -->
                <div class="intro-y box">
                    <div class="p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Ajouter un Chef
                        </h2>
                    </div>
                    <div class="p-5">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form method="POST" action="{{ route('chefs.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom:</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth:</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Female">Other</option>

                                </select>
                            </div>

                            <div class="form-group">
    <label for="national_id">National ID:</label>
    <input type="text" name="national_id" id="national_id" class="form-control" value="{{ old('national_id') }}" placeholder="e.g. ABC12345678">
    @error('national_id')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>



                            <div class="form-group">
                                <label for="agency_id">Select Agency:</label>
                                <select name="agency_id" id="agency_id" class="form-control">
                                    <option value="">Select an Agency</option>
                                    @foreach($agencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
