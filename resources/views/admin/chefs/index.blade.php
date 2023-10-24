@extends('admin.theme')

@section('content')

<div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Chefs d'agences</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                 
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="bell" data-lucide="bell" class="lucide lucide-bell notification__icon dark:text-slate-500"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 01-3.46 0"></path></svg> </div>
                   
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
               
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
                   <span style="margin-left: 11px;">  Liste des chefs </span>
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                   
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
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
                    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>National ID</th>
                <th>Nom de l'Agence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chefs as $chef)
            <tr>
                <td>{{ $chef->nom }}</td>
                <td>{{ $chef->prenom }}</td>
                <td>{{ $chef->email }}</td>
                <td>{{ $chef->address }}</td>
                <td>{{ $chef->date_of_birth }}</td>
                <td>{{ $chef->gender }}</td>
                <td>{{ $chef->national_id }}</td>
                <td>
                @if($chef->agenceLocation)
                    {{ $chef->agenceLocation->name }}
                @else
                    No Agency
                @endif
            </td>              
             <td>
    <a href="{{ route('chefs.edit', $chef) }}" class="btn btn-primary">Edit</a>
    <button class="btn btn-danger" onclick="deleteChef({{ $chef->id }})">Delete</button>
</td>

<script>
    function deleteChef(chefId) {
        if (confirm("Are you sure you want to delete this chef?")) {
            // If the user confirms, submit the delete form
            document.getElementById('delete-chef-form-' + chefId).submit();
        }
    }
</script>

<form id="delete-chef-form-{{ $chef->id }}" action="{{ route('chefs.destroy', $chef) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
                                </div>
                                <div class="col-span-6 text-right mt-1">
            <a href="{{ route('chefs.create') }}" class="text-blue-500 add-car-link font-bold" style="color: #1e40af;">
                Add new head of agency +
            </a>
        </div>
                        </div>




@endsection
