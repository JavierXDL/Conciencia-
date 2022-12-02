@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mis revisiones</h3>
        </div>
        <hr>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    {{-- <h5>Hola, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h5> --}}
                    <table class="table table-striped mt-2">
                        <thead style="background-color:#A64812">
                            <th style="display: none;">ID</th>
                            <th style="color:#fff;">Título</th>
                            <th style="color:#fff;">Autor</th>
                            <th style="color:#fff;">Correcciones</th>
                            <th style="color:#fff;">Imagen</th>
                            <th style="color:#fff;">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $articulo)
                            @if ( \Illuminate\Support\Facades\Auth::user()->id == $articulo->id_revisor)

                            <tr>
                                <td style="display: none;">{{ $articulo->id }}</td>
                                <td>{{ $articulo->titulo }}</td>
                                <td>{{ $articulo->autor }}</td>
                                <td>{{ $articulo->comentario }}</td>
                                <!-- Metodo de la imagen -->

                                <td> <img src="/image/{{ $articulo->image }}" width="100px"></td>
                                <td><a class="btn btn-info" href="{{ route('articulos.edit',$articulo->id) }}">Ver</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
@endsection
