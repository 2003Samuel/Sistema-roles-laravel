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

                            <a href="{{ route('usuarios.create') }}" class="btn btn-success">Nuevo</a>

                            <div class="table-responsive">
                                <table class="table table-striped mt-3 ">
                                    <thead style="background-color: #6777ef;">
                                        <th class="text-white">#</th>
                                        <th class="text-white">Nombre</th>
                                        <th class="text-white">E-mail</th>
                                        <th class="text-white">Rol</th>
                                        <th class="text-white">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $rolName)
                                                            <h5><span
                                                                    class="{{ $rolName == 'Administrador' ? 'badge badge-info' : 'badge badge-dark' }}">
                                                                    {{ $rolName }}</span></h5>
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('usuarios.edit', $user->id) }}"
                                                        class="btn btn-warning">Editar</a>
                                                    <form action="{{ route('usuarios.destroy', $user->id) }}"
                                                        style="display: inline" method="POST" id="form-eliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
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
                'Usuario registrado',
                'success'
            )
        </script>
    @elseif (Session::get('update'))
        <script type="text/javascript">
            Swal.fire(
                '{{ Session::get('update') }}',
                'Usuario actualizado',
                'success'
            )
        </script>
    @endif
@endsection
