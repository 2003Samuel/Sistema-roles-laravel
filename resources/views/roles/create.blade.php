@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nuevo rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong class="mx-2">Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger font-weight-bolder mx-1">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Nombre del rol</label>
                                                <input type="text" name="name"
                                                    class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mt-4">
                                                <label for="name">Permisos para este rol</label>
                                                <br>
                                                @foreach ($permission as $p)
                                                    <label>
                                                        <input type="checkbox" name="permission[]"
                                                            value="{{ $p->id }}" id="">
                                                        {{ $p->name }}
                                                    </label>
                                                    <br>
                                                @endforeach
                                                @error('permission')
                                                    <span
                                                        class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
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
