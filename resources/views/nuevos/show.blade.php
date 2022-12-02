@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $articulo->titulo }}</h1>
                <p class="text-muted">{{ $articulo->autor }}</p>
                <hr>
            </div>

                <img class="" src="/image/{{ $articulo->image }}">
                <p class="">{{ $articulo->autor }}</p>
                <p class="">{{ $articulo->contenido }}</p>
        </div>
    </div>
@endsection
