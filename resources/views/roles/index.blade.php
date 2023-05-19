@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a href="{{ route('roles.create') }}" class="btn btn-success">Nuevo</a>
                            @endcan

                            <div class="table-responsive">
                                <table class="table table-striped mt-3 ">
                                    <thead style="background-color: #6777ef;">
                                        <th class="text-white">#</th>
                                        <th class="text-white">Rol</th>
                                        <th class="text-white">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $rol)
                                            <tr>
                                                <td>{{ $rol->id }}</td>
                                                <td>{{ $rol->name }}</td>

                                                <td>
                                                    @can('editar-rol')
                                                        <a href="{{ route('roles.edit', $rol->id) }}"
                                                            class="btn btn-warning">Editar</a>
                                                    @endcan

                                                    @can('borrar-rol')
                                                        <form id="form-delete" action="{{ route('roles.destroy', $rol->id) }}"
                                                            method="POST" style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">Borrar</button>
                                                        </form>
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
        </div>
    </section>
@endsection


@section('scripts')
    @if (Session::get('success'))
        <script type="text/javascript">
            Swal.fire(
                '{{ Session::get('success') }}',
                'Rol registrado',
                'success'
            )
        </script>
    @elseif (Session::get('update'))
        <script type="text/javascript">
            Swal.fire(
                '{{ Session::get('update') }}',
                'Rol actualizado',
                'success'
            )
        </script>
    @elseif (Session::get('error'))
        <script type="text/javascript">
            Swal.fire(
                '{{ Session::get('error') }}',
                'Rol existente',
                'error'
            )
        </script>
    @endif
@endsection
