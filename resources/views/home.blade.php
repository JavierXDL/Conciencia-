@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($articulos as $articulo)
                    @if ($articulo->estado == '5')
                        <div class="col">
                            <div class="card h-100">
                                <img src="/image/{{ $articulo->image }}" height="200px" class="card-img-top" alt="..naiz.">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $articulo->titulo }}</h5>
                                    <p class="card-text">{{ $articulo->autor }}</p>

                                    <p class="card-text">{{ Illuminate\Support\Str::of($articulo->contenido)->words(20) }}</p>
                                    <a class="btn btn-info" href="{{ route('show', $articulo->id) }}">ver</a>

                                </div>
                            </div>
                        </div>
                        @csrf
                    @else
                    @endif
                @endforeach
            </div>
            <br>
            <br>
            <br>
            <!-- Ubicamos la paginacion a la derecha -->
            <div class="pagination justify-content-end">
                {{ $articulos->appends(['search' => $search]) }}
            </div>
        </div>
    </div>
@endsection
