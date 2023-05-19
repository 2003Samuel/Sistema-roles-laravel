@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nuevo usuario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Resive los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger ">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('usuarios.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Nombre</label>
                                                <input type="text" name="name" id=""
                                                    class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                            </div>
                                            @error('name')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br />
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Correo electronico</label>
                                                <input type="email" name="email" id=""
                                                    class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                            </div>
                                            @error('email')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br />
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Contraseña</label>
                                                <input type="password" name="password" id=""
                                                    class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                            </div>
                                            @error('password')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br />
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Confirmar contraseña</label>
                                                <input type="password" name="confirm-password" id=""
                                                    class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                            </div>
                                            @error('password')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br />
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Rol</label>
                                                <select name="roles[]"
                                                    class="form-control  {{ $errors->has('rol') ? 'is-invalid' : '' }}"
                                                    id="">
                                                    @foreach ($roles as $r)
                                                        <option value="{{ $r }}">{{ $r }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('rol')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br />
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
