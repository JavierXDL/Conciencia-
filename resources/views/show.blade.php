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
            <style>
                .imgm {
                    height: 40em;
                    width:80em;
                    max-width: 100%;
                    align:center;

                }
            </style>

            <!-- Preview image figure-->
            <section class="mb-5">

            <img class="imgm" src="/image/{{ $articulo->image }}" />
            <!-- Post content-->
            <br>
            <br>
            <br>

                <p class="fs-5 mb-4">{{ $articulo->contenido }}</p>
            </section>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr>
        </div>
    </div>
@endsection
