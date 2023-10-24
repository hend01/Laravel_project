@extends('front.theme')

@section('content')
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#000;color:white;border-radius: 8px;">
        <span style="margin-left: 11px;"> Liste des agences </span>
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>address</th>
                        <th>phone number</th>
                        <th>email</th>
                        <th>description</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($agences as $agence)
                        <tr>
                            <td>{{ $agence->name }}</td>
                            <td>{{ $agence->address }}</td>
                            <td>{{ $agence->phone_number }}</td>
                            <td>{{ $agence->email }}</td>
                            <td>{{ $agence->description }}</td>

                           
                           

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
