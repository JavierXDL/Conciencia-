@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Artículos en revisión</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#A64812">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Título</th>
                                    <th style="color:#fff;">Autor</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Imagen</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($articulos as $articulo)
                                        @if ($articulo->estado == '1')
                                            <tr>
                                                <td style="display: none;">{{ $articulo->id }}</td>
                                                <td>{{ $articulo->titulo }}</td>
                                                <td>{{ $articulo->autor }}</td>
                                                <td>{{ $articulo->contenido }}</td>
                                                <!-- Metodo de la imagen -->

                                                <td> <img src="/image/{{ $articulo->image }}" width="100px"></td>
                                                <td>

                                                    <form action="{{ route('articulos.destroy', $articulo->id) }}"
                                                        method="POST">
                                                        @can('editar-articulo')
                                                            <a class="btn btn-info"
                                                                href="{{ route('articulos.edit', $articulo->id) }}">Ver</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-articulo')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @else
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $articulos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
