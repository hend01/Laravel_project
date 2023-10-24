@extends('front.theme')

@section('content')
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-3">
            <div class="card border border-gray-200 rounded-lg shadow-lg mb-4">
                <img src="{{ asset('assets/img/car.jpg') }}" alt="Car Image" class="w-full h-32 object-cover rounded-t-lg">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{$car->make}} {{$car->model}}</h2>
                    <p><strong>Year:</strong> {{$car->year}}</p>
                    <p><strong>Color:</strong> <span class="color-badge" style="background-color: {{$car->color}};"></span> {{$car->color}}</p>
                    <p><strong>License Plate:</strong> {{$car->license_plate}}</p>
                    <p><strong>Driver:</strong> {{$car->driver->first_name}} {{$car->driver->last_name}}</p>
                    <p><strong>Creation Date:</strong> {{$car->created_at}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
