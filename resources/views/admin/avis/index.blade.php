@extends('admin.theme')

@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Avis</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
        </div>
        <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
            <span style="margin-left: 11px;"> Avis List </span>
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Driver</th>
                            <th>Commentaire</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aviss as $avis)
                        <tr>
                            <td>{{ $avis->evaluation->driver->id }}</td>
                            <td>{{ $avis->commentaire }} </td>
                            <td>{{ $avis->evaluation->user->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
