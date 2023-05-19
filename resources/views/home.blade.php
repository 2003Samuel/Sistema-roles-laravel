@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Panel</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Usuarios</h5>
                                            <div class="d-flex justify-content-between ">
                                                <i class="fa fa-users f-left"></i>
                                                <h2>{{ $usersCount }}</h2>
                                            </div>
                                            <p class="m-0 text-right"><a class="text-white" href="/usuarios">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Roles</h5>
                                            <div class="d-flex justify-content-between ">
                                                <i class="fa fa-user-lock f-left"></i>
                                                <h2>{{ $rolesCount }}</h2>
                                            </div>
                                            <p class="m-0 text-right"><a class="text-white" href="/roles">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-red order-card">
                                        <div class="card-block">
                                            <h5>Blogs</h5>
                                            <div class="d-flex justify-content-between ">
                                                <i class="fa fa-blog f-left"></i>
                                                <h2>{{ $blogsCount }}</h2>
                                            </div>
                                            <p class="m-0 text-right"><a class="text-white" href="/roles">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
