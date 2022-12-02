@extends('layouts.app')

@section('content')
    <section class="section">
        @if ($articulo->estado == '1')
            <div class="section-header">
                <h3 class="page__heading">Artículo en revisión</h3>
            </div>
        @else
            <div class="section-header">
                <h3 class="page__heading">Editar Artículo </h3>
            </div>
        @endif
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('articulos.update', $articulo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Inicio del if --}}
                                @if ($articulo->estado == '0' || $articulo->estado == '4')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="titulo">Título</label>
                                                <input type="text" name="titulo" class="form-control"
                                                    value="{{ $articulo->titulo }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="autor">Autor</label>
                                                <input type="text" name="autor" class="form-control"
                                                    value="{{ $articulo->autor }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="contenido">Contenido</label>
                                                <textarea class="form-control" name="contenido" style="height: 100px">{{ $articulo->contenido }}</textarea>
                                            </div>
                                        </div>
                                        <!-- Imagen metodo -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Image:</strong>
                                                <input type="file" name="image" class="form-control"
                                                    placeholder="image">
                                                <img src="/image/{{ $articulo->image }}" width="100px">
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Fin del metodo de la imagen -->

                                        @can('borrar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-check">
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="flexCheckDefault" name="estado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Aprobar artículo
                                                    </label>
                                                </div>
                                            </div>
                                        @endcan
                                        @can('editar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-check">
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" value="2"
                                                        id="flexCheckDefault" name="estado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Revisar artículo
                                                    </label>
                                                    <div>
                                                        <input id="" name="id_revisor" type="hidden"
                                                            value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                        @can('borrar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-check">
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" value="5"
                                                        id="flexCheckDefault" name="estado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Publicar artículo
                                                    </label>
                                                </div>
                                            </div>
                                        @endcan
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                @endif
                                @if ($articulo->estado == '2')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <h1>{{ $articulo->titulo }}</h1>
                                                <input type="hidden" name="titulo" class="form-control"
                                                    value="{{ $articulo->titulo }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <p class="text-muted">{{ $articulo->autor }}</p>
                                                <input type="hidden" name="autor" class="form-control"
                                                    value="{{ $articulo->autor }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="contenido">Abstract</label>
                                                <textarea class="form-control" name="contenido" style="height: 100px">{{ $articulo->contenido }}</textarea>
                                                <br>
                                            </div>
                                        </div>
                                        <!-- Imagen metodo -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" type="file" name="image" class="form-control"
                                                    placeholder="image">
                                                <img src="/image/{{ $articulo->image }}" width="100px">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <br>
                                                <label for="contenido">Correcciones</label>
                                                <textarea class="form-control" name="comentario" style="height: 100px">{{ $articulo->comentario }}</textarea>
                                                <br>
                                            </div>
                                        </div>
                                        <!-- Fin del metodo de la imagen -->

                                        @can('borrar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-check">
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="flexCheckDefault" name="estado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Aprobar artículo
                                                    </label>
                                                </div>
                                            </div>
                                        @endcan
                                        @can('editar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="estado"
                                                        id="inlineRadio1" value="3">
                                                    <label class="form-check-label" for="inlineRadio1">Corregir
                                                        artículo</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="estado"
                                                        id="inlineRadio2" value="4">
                                                    <label class="form-check-label" for="inlineRadio2">Artículo
                                                        aprobado</label>
                                                </div>
                                            </div>
                                        @endcan
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br>
                                            <button href="{{ '/home' }}" type="submit"
                                                class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                @endif
                                @if ($articulo->estado == '1')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <h1>{{ $articulo->titulo }}</h1>
                                                <input type="hidden" name="titulo" class="form-control"
                                                    value="{{ $articulo->titulo }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <p class="text-muted">{{ $articulo->autor }}</p>
                                                <input type="hidden" name="autor" class="form-control"
                                                    value="{{ $articulo->autor }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="contenido">Abstract</label>
                                                <textarea class="form-control" name="contenido" style="height: 100px">{{ $articulo->contenido }}</textarea>
                                                <br>
                                            </div>
                                        </div>
                                        <!-- Imagen metodo -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" type="file" name="image" class="form-control"
                                                    placeholder="image">
                                                <img src="/image/{{ $articulo->image }}" width="100px">
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Fin del metodo de la imagen -->

                                        @can('borrar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-check">
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="flexCheckDefault" name="estado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Aprobar artículo
                                                    </label>
                                                </div>
                                            </div>
                                        @endcan
                                        @can('editar-articulo')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-check">
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" value="2"
                                                        id="flexCheckDefault" name="estado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Revisar artículo
                                                    </label>
                                                    <div>
                                                        <input id="" name="id_revisor" type="hidden"
                                                            value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br>
                                            <button href="{{ '/home' }}" type="submit"
                                                class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
