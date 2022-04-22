@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier un utilisateur!</h1>
                            </div>
                            <form  action="{{ route('users.store') }}" method="post" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="nom" type="text" class="form-control form-control-user
                    form-control @error('nom') is-invalid @enderror" id="exampleFirstName" placeholder="Nom" value="{{$user->nom}}">

                                        @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="prenom" type="text" class="form-control form-control-user
                    @error('prenom') is-invalid @enderror" id="exampleLastName" placeholder="Prénom" value="{{$user->prenom}}">
                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-user  @error('username')
                                        is-invalid @enderror" placeholder="username" value="{{$user->username}}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user
                  @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Adresse Email" value="{{$user->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- Tel 2 --}}
                                <div class="form-group">
                                    <input name="tel1" type="text" class="form-control form-control-user
                  @error('tel1') is-invalid @enderror" id="tel1" placeholder="Tel1" value="{{$user->tel1}}">
                                    @error('tel1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--      Tel 2 --}}
                                <div class="form-group">
                                    <input name="tel2" type="text" class="form-control form-control-user
                  @error('tel2') is-invalid @enderror" id="tel2" placeholder="Tel2" value="{{$user->tel2}}">
                                    @error('tel2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--      lieu de naissance--}}
{{--                                <div class="form-group">--}}
{{--                                    <input name="lieuN" type="text" class="form-control form-control-user--}}
{{--                                     @error('lieuN') is-invalid @enderror" id="lieuN" placeholder="lieuN" value="{{$user->lieuNaissance}}">--}}
{{--                                    @error('lieuN')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                                {{--      date Naissance --}}
{{--                                <div class="form-group">--}}
{{--                                    <input name="dateN" type="date" class="form-control form-control-user--}}
{{--                  @error('dateN') is-invalid @enderror" id="dateN" placeholder="date Naissance">--}}
{{--                                    @error('dateN')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                                {{--      Adress --}}
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control form-control-user
                  @error('address') is-invalid @enderror" id="address" placeholder="Address" value="{{$user->adresse}}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--      Etat--}}
                                <div class="form-group">
                                    <input name="etat" type="text" class="form-control form-control-user
                  @error('etat') is-invalid @enderror" id="etat" placeholder="Etat" value="{{ $user->etat}}">
                                    @error('etat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- idFonction  --}}
                                <div class="form-group text-center">

                                    <select class="fonction custom-select" name="idFonction" id="idFonction" required>
                                        <option selected value="{{ $user->idFonction }}"> {{ $user->idFonction }}</option>

                                        @foreach( $fonctions as $fonction)
                                            <option value="{{ $fonction->id}}">{{ $fonction->nom}}</option>

                                        @endforeach

                                    </select>
                                </div>

                                {{-- idDepot  --}}
                                <div class="form-group text-center">

                                    <select class="depot custom-select" name="iddepot" id="iddepot" required>
                                        <option selected value="{{ $user->idDepot }}"> {{ $user->idDepot }}</option>

                                        @foreach( $depots as $depot)
                                            <option value="{{ $depot->id}}">{{ $depot->nom}}</option>

                                        @endforeach

                                    </select>
                                </div>

                                {{-- idgroupe  --}}
                                <div class="form-group text-center">

                                    <select class="groupe custom-select" name="idgroupe" id="idgroupe" required>
                                        <option selected value="{{ $user->idGroupe }}">{{ $user->idGroupe }}</option>

                                        @foreach( $groupes as $groupe)
                                            <option value="{{ $groupe->id}}">{{ $groupe->nom}}</option>

                                        @endforeach

                                    </select>
                                </div>


                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user @error('password')
                                        is-invalid @enderror" id="exampleInputPassword" placeholder="Mot de Passe">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Créer un compte utilisateur" class="btn btn-primary btn-user btn-block"/>
                                </div>

                                <div class="form-group">
                                    <input type="reset" value="Annuler" class="btn btn-primary btn-user btn-block"/>
                                </div>
                                <div class="form-group">
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
