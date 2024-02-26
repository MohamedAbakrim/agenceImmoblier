@extends('admin.admin')

@section('title', $property->exists ? 'Edit un bien' : 'Ajouter un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="POST">

        @csrf
        @method($property->exists ? "PUT" : "POST")

        <div class="row">
            @include('shared.input', ["class" => "col", "label" => "Titre", "name" => "title", "value" => $property->title])
            <div class="col row">
                @include('shared.input', ["class" => "col", "label" => "Surface", "name" => "surface", "value" => $property->surface])
                @include('shared.input', ["class" => "col", "label" => "Prix", "name" => "price", "value" => $property->price])
            </div>
        </div>

        @include('shared.input', ["type" => "textarea", "label" => "Description", "name" => "description", "value" => $property->description])

        <div class="row">
            @include('shared.input', ["type" => "number", "class" => "col", "label" => "Pièces", "name" => "rooms", "value" => $property->rooms])
            @include('shared.input', ["type" => "number", "class" => "col", "label" => "Chambres", "name" => "bedrooms", "value" => $property->bedrooms])
            @include('shared.input', ["type" => "number", "class" => "col", "label" => "Etage", "name" => "floor", "value" => $property->floor])
        </div>

        <div class="row">
            @include('shared.input', ["class" => "col", "label" => "Adress", "name" => "adress", "value" => $property->adress])
            @include('shared.input', ["class" => "col", "label" => "Ville", "name" => "city", "value" => $property->city])
            @include('shared.input', ["type" => "number", "class" => "col", "label" => "Code Postal", "name" => "postal_code", "value" => $property->postal_code])
        </div>
        @include('shared.checkbox', ["label" => "Vendu", "name" => "sold", "value" => $property->sold])
        <button class="btn btn-primary">
            @if($property->exists)
                Modifier
            @else
                Créer
            @endif
        </button>

    </form>

@endsection