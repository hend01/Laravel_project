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
            <span style="margin-left: 11px;"> Modifier une agence </span>
        </h2>
        <div class="grid grid-cols gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- Chef Form -->
                <div class="intro-y box">
                    <div class="p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Modifier une agence
                        </h2>
                    </div>
                    <div class="p-5">
                        <form method="POST" action="{{ route('agences.update', $agence) }}">
                            @csrf
                            @method('PUT') <!-- Use PUT method to update the agence -->

                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $agence->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $agence->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $agence->address }}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $agence->phone_number }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control">{{ $agence->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
