@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un utilisateur!</h1>
                            </div>
                            <form  action="{{ route('users.store') }}" method="post" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="nom" type="text" class="form-control form-control-user
                        form-control @error('nom') is-invalid @enderror" id="exampleFirstName" placeholder="Nom">

                                        @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="prenom" type="text" class="form-control form-control-user
                    @error('prenom') is-invalid @enderror" id="exampleLastName" placeholder="Prénom">
                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-sm-6">
                                    <input name="username" type="text" class="form-control form-control-user  @error('username') is-invalid @enderror" placeholder="username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <input name="email" type="email" class="form-control form-control-user
                  @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Adresse Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                {{-- Tel 2 --}}
                                <div class="row">
                                <div class="form-group col-sm-6">
                                    <input name="tel1" type="text" class="form-control form-control-user
                  @error('tel1') is-invalid @enderror" id="tel1" placeholder="Tel1">
                                    @error('tel1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{--      Tel 2 --}}
                                <div class="form-group col-sm-6">
                                    <input name="tel2" type="text" class="form-control form-control-user
                  @error('tel2') is-invalid @enderror" id="tel2" placeholder="Tel2">
                                    @error('tel2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                {{--      lieu de naissance--}}
                                <div class="row">
                                <div class="form-group col-sm-6 ">
                                    <input name="lieuN" type="text" class="form-control form-control-user
                                     @error('lieuN') is-invalid @enderror" id="lieuN" placeholder="lieu de Naissance">
                                    @error('lieuN')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--      date Naissance --}}
                                <div class="form-group col-sm-6 ">
                                    <input name="dateN" type="date" class="form-control form-control-user
                  @error('dateN') is-invalid @enderror" id="dateN" placeholder="date Naissance">
                                    @error('dateN')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                {{--      Adress --}}
                                <div class="row">
                                <div class="form-group col-sm-6">
                                    <input name="address" type="text" class="form-control form-control-user
                  @error('address') is-invalid @enderror" id="address" placeholder="adresse">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--      Etat--}}
                                <div class="form-group col-sm-6">
                                    <input name="etat" type="text" class="form-control form-control-user
                  @error('etat') is-invalid @enderror" id="etat" placeholder="Etat">
                                    @error('etat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                {{-- idFonction  --}}
                                <div class="row">
                                <div class="form-group text-center col-sm-6">

                                    <select class="fonction custom-select" name="idFonction" id="idFonction" required>
                                        <option disabled selected> Select Fonction</option>

                                        @foreach( $fonctions as $fonction)
                                            <option value="{{ $fonction->id}}">{{ $fonction->nom}}</option>

                                        @endforeach

                                    </select>
                                </div>

                                {{-- idDepot  --}}
                                <div class="form-group text-center col-sm-6">

                                    <select class="depot custom-select" name="iddepot" id="iddepot" required>
                                        <option disabled selected > Select Depot</option>

                                        @foreach( $depots as $depot)
                                            <option value="{{ $depot->id}}">{{ $depot->nom}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                </div>
                                {{-- idgroupe  --}}
                                <div class="row">


                                </div>
                                <div class="row">
                                <div class="form-group col-sm-6">
                                    <input name="password" type="password" class="form-control form-control-user @error('password')
                                        is-invalid @enderror" id="exampleInputPassword" placeholder="Mot de Passe">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <input name="password_confirmation" type="password" class="form-control form-control-user"
                                           placeholder="Conform password">
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-6 m-auto">
                                    <input type="submit" value="Créer un compte utilisateur" class="btn btn-primary btn-user btn-block"/>
                                </div>

                                </div>
                                <div class="form-group w-50">
                                    <br/>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection
        @section('page-js-script')
    </div>
@endsection
