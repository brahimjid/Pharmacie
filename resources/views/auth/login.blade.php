
@extends('layouts.app')
@section('content')

    @if(!Auth::guest() &&Request::path() == '/')

        <nav class="navbar fixed-top navbar-light bg-light justify-content-end">
            <a class="navbar-brand" href="/home">Dashbord</a>
        </nav>

    @endif


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="
                                background-image: url('{{ asset('img/logo.jpg')}}')">

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue</h1>
                                    </div>
                                    <hr>
                                    <form action="{{ route('login') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user
                                    @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="Entrez nom de l'utilisateur" autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user
                      @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Mot de Passe">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                            @enderror
                                        </div>

                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block"/>
                                        <input type="reset" value="Annuler" class="btn btn-primary btn-user btn-block"/>


                                        <br/>
                                        <br/>



                                    </form>

                                    <div class="text-center">
{{--                                        <a class="small" href="{{route('register')}}">Creer un compte utilisateur!</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection


