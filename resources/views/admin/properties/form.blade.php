@extends('admin.admin')

@section('title', $property->exists ? 'Edit un bien' : 'Ajouter un bien')

@section('content')

    <h1>@yield('title')</h1>

@endsection