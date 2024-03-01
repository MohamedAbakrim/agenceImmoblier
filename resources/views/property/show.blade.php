@extends('base')

@section('title', $property->title)

@section('content')

    <div class="container mt-4">
        <h1>{{$property->title}}</h1>
        <h2 class="card-text">{{$property->surface}}m² - {{$property->city}} {{$property->postal_code}}</h2>
        <div class="text-primary fw-bold" style="font-size:4rem">
            {{number_format($property->price, thousands_separator:' ')}} $
        </div>



        <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>
            <form action="" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ["class" => "col", "label" => "Prénom", "name" => "firstName"])
                    @include('shared.input', ["class" => "col", "label" => "Nom", "name" => "lastName"])
                </div>
                <div class="row">
                    @include('shared.input', ["class" => "col", "label" => "Téléphone", "name" => "phone_number"])
                    @include('shared.input', ["type" => "email", "class" => "col", "label" => "E-mail", "name" => "email"])
                </div>
                @include('shared.input', ["type" => "textarea", "class" => "col", "label" => "Votre message", "name" => "message"])
                <div>
                    <button class="btn btn-primary">Nous Contacter</button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <p>{{$property->description}}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitale</td>
                            <td>{{$property->surface}} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{$property->rooms}}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{$property->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{$property->floor ?: 'Rez de chaussé'}}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{$property->adress}}
                                {{$property->city}} {{$property->postal_code}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>spécifités</h2>
                    <ul class="list-group">
                        @foreach($property->options as $option)
                            <li class="list-group-item">
                                {{$option->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection