@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Publicar Artículo</h3>
    </div>
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

                        <form action="{{ route('articulos.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="autor">Autor</label>
                                        <input type="text" name="autor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="formfloating">
                                        <label for="contenido">Abstract</label>
                                        <textarea class="form-control" name="contenido" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <!-- Inicio del metodo de la imagen -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">

                                        <strong>Imagen</strong>
                                        <input type="file" name="image" class="form-control" placeholder="image">

                                        <div>
                                            <br>
                                            <strong>Documento</strong>
                                            <br>
                                            <input type="file" name="file" required>
                                            <br>
                                            <br>
                                        </div>
                                        <div>
                                            <input id="" name="estado" type="hidden" value="0">
                                        </div>
                                        <div>
                                            <input id="" name="id_usuario" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->id}}">
                                        </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                                <!-- fin del metodo de la imagen -->

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
