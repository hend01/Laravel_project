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
                        <th>offer</th>
                        <th>prix</th>
    
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $produit->name }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->offer }}</td>
                            <td>{{ $produit->prix }}</td>
                        </tr>
                </tbody>
            </table>
          
    
        </div>
    </div>
</div>

@endsection