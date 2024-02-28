@extends('base')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Immobilier</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa cumque, nostrum exercitationem sint ducimus fugit quasi earum. Harum, maiores! Ab?</p>
        </div>
    </div>


    <div class="container">
        <h2>Nos Derniers Biens</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection