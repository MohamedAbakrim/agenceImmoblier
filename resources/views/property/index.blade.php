@extends('base')

@section('title', 'Nos Biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <form action="" method="get" class="d-flex gap-2">
                <input type="number" placeholder="Budget Max" name="price" class="form-control" value="{{ $input['price'] ?? ''}}">
                <button class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @endforeach
        </div>
        <div class="my-4">
            {{$properties->links()}}
        </div>
    </div>

@endsection