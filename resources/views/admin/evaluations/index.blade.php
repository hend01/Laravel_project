@extends('admin.theme')

@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Evaluations</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
        </div>
        <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
            <span style="margin-left: 11px;"> Evaluations List </span>
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Driver</th>
                            <th>Note</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluations as $evaluation)
                        <tr>
                            <td>{{ $evaluation->driver->id }}</td>
                            <td>{{ $evaluation->note }} </td>
                            <td>{{ $evaluation->user->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
