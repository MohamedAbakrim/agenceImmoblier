@extends('base')

@section('title', 'Nos Biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <form action="" method="get" class="d-flex gap-2">
                <input type="number" placeholder="Budget Max" name="price" class="form-control" value="{{ $input['price'] ?? ''}}">
                <input type="number" placeholder="Surface Minimum" name="surface" class="form-control" value="{{ $input['surface'] ?? ''}}">
                <input type="number" placeholder="Nombre de pièces min" name="rooms" class="form-control" value="{{ $input['rooms'] ?? ''}}">
                <input type="text" placeholder="Mot clef" name="title" class="form-control" value="{{ $input['title'] ?? ''}}">                
                <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col mb-4">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse
        </div>
        <div class="my-4">
            {{$properties->links()}}
        </div>
    </div>

@endsection