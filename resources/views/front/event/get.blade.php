@extends('front.theme')

@section('content')
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
        <span style="margin-left: 11px;"> event </span>
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible ">
            
              
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>Description</th>
                        <th>event_type</th>
                        <th>event_type</th>
    
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->event_type }}</td>
                            <td>{{ $event->event_type }}</td>
                        </tr>
                </tbody>
            </table>
            <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
                <span style="margin-left: 11px;"> products </span>
            </h2>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    @foreach($produit as $p)
                    <tr>
                        <th>name</th>
                        <th>offer</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->offer }}</td>
                        </tr>
                </tbody>
            </table>
            @endforeach
    
        </div>
    </div>
</div>

@endsection