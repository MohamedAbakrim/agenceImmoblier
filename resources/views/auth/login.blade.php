
@extends('base')


@section('title', 'Se Connecter')


@section('content')

    <div class="container mt-4">
        <h1>@yield('title')</h1>
        @include('shared.flash')
        <form action="{{route('login')}}" method="post" class="vstack gap-3">
            @csrf
            @include('shared.input', ["type" => "email", "label" => "Email", "name" => "email"])
            @include('shared.input', ["type" => "password", "label" => "Mot de passe", "name" => "password"])
            <div>
                <button class="btn btn-primary">Se Connecter</button>
            </div>
        </form>
    </div>

@endsection