@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar blog</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Titulo</label>
                                                <input type="text" name="titulo" id=""
                                                    class="form-control  {{ $errors->has('titulo') ? 'is-invalid' : '' }}"
                                                    value="{{ $blog->titulo }}">
                                            </div>
                                            @error('titulo')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="name">Contenido</label>
                                                <textarea name="contenido" class="form-control  {{ $errors->has('contenido') ? 'is-invalid' : '' }}"
                                                    style="height: 100px">{{ $blog->contenido }}</textarea>
                                            </div>
                                            @error('contenido')
                                                <span
                                                    class="invalid feedback text-danger font-weight-bolder">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                            <button type="submit" class="btn btn-success">Editar</button>
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
