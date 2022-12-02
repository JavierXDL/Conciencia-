@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Post title-->
                <h1 class="fw-bolder">{{ $articulo->titulo }}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic">{{ $articulo->autor }}</div>
            </div>
            <hr>

            <!-- Preview image figure-->

            <img class="img-thumbnail" src="/image/{{ $articulo->image }}"/>
            <!-- Post content-->

            <section class="mb-5">
                <p class="fs-5 mb-4">{{ $articulo->contenido }}</p>
            </section>
        </div>
    </div>
@endsection
