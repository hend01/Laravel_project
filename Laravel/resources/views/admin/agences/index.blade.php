
@extends('admin.theme')

@section('content')

<div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Agences de location</li>
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
                   <span style="margin-left: 11px;">  Liste des agences </span>
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
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Address</th>
                <th>phone number</th>
                <th>description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agences as $agence)
            <tr>
                <td>{{ $agence->name }}</td>
                <td>{{ $agence->email }}</td>
                <td>{{ $agence->address }}</td>

                <td>{{ $agence->phone_number }}</td>
                <td>{{ $agence->description }}</td>

                <td>{{ $agence->address }}</td>
                <td>
    <a href="{{ route('agences.edit', $agence) }}" class="btn btn-primary">Edit</a>
    <button class="btn btn-danger" onclick="deleteChef({{ $agence->id }})">Delete</button>
</td>

<script>
    function deleteChef(agenceId) {
        if (confirm("Are you sure you want to delete this agence?")) {
            // If the user confirms, submit the delete form
            document.getElementById('delete-agence-form-' + agenceId).submit();
        }
    }
</script>

<form id="delete-agence-form-{{ $agence->id }}" action="{{ route('agences.destroy', $agence) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
                                </div>
                            
                        </div>




@endsection
