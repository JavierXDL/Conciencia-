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
            <p class="">{{ $articulo->contenido }}</p>

            @if ($articulo->estado == '3')
                @can('ver-articulo')
                    <form action="{{ route('articulos.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-check">
                                    <br>
                                    <input class="form-check-input" type="checkbox" value="2" id="flexCheckDefault"
                                        name="estado">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Revisar artículo
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                @endcan
            @else
                @can('editar-articulo')
                    <form action="{{ route('articulos.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="estado" id="inlineRadio1" value="3">
                                    <label class="form-check-label" for="inlineRadio1">Corregir artículo</label>
                                </div>

                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="estado" id="inlineRadio2" value="4">
                                    <label class="form-check-label" for="inlineRadio2">Artículo aprobado</label>
                                  </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                @endcan
            @endif



        </div>
    </div>
@endsection
