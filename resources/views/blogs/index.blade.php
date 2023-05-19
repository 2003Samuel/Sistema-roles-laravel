@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blogs</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-blog')
                                <a href="{{ route('blogs.create') }}" class="btn btn-success">Nuevo</a>
                            @endcan

                            <div class="table-responsive">
                                <table class="table table-striped mt-3 ">
                                    <thead style="background-color: #6777ef;">
                                        <th class="text-white">#</th>
                                        <th class="text-white">Titulo</th>
                                        <th class="text-white">Contenido</th>
                                        @can('editar-blog' || '')
                                            <th class="text-white">Acciones</th>
                                        @endcan
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $blog->id }}</td>
                                                <td>{{ $blog->titulo }}</td>
                                                <td>{{ $blog->contenido }}</td>

                                                <td>
                                                    <form id="form-eliminar" method="POST"
                                                        action="{{ route('blogs.destroy', $blog->id) }}">
                                                        @can('editar-blog')
                                                            <a href="{{ route('blogs.edit', $blog->id) }}"
                                                                class="btn btn-warning m-1">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-blog')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
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
        </div>
    </section>
@endsection


@section('scripts')
    @if (Session::get('success'))
        <script type="text/javascript">
            Swal.fire(
                '{{ Session::get('success') }}',
                'Blog registrado',
                'success'
            )
        </script>
    @elseif (Session::get('update'))
        <script type="text/javascript">
            Swal.fire(
                '{{ Session::get('update') }}',
                'Blog actualizado',
                'success'
            )
        </script>
    @endif
@endsection
