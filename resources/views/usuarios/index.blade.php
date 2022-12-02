@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center"> </h3>

                            {{-- <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a> --}}
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #A64812;">
                                    <th style="color: #fff;">ID</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">Correo</th>
                                    <th style="color: #fff;">Rol</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if (!empty($usuario->getRoleNames()))
                                                    @foreach ($usuario->getRoleNames() as $rolName)
                                                        <h6>
                                                            {{ $rolName }}
                                                        </h6>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <!-- Botones -->
                                            <td>
                                                @can('editar-usuario')
                                                <a class="btn btn-info"
                                                    href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                                                @endcan

                                                <!-- Boton con html collective -->
                                                @can('borrar-usuario')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['usuarios.destroy', $usuario->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>


                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
