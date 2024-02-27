@extends('admin.admin')

@section('title', $option->exists ? 'Edit une option' : 'Ajouter une option')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{route($option->exists ? 'admin.option.update' : 'admin.option.store', $option)}}" method="POST">

        @csrf
        @method($option->exists ? "PUT" : "POST")


        @include('shared.input', ["label" => "Nom", "name" => "name", "value" => $option->name])
        <button class="btn btn-primary">
            @if($option->exists)
                Modifier
            @else
                Créer
            @endif
        </button>

    </form>

@endsection