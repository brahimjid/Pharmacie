@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
{{--                <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>--}}
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Créer un utilisateur!</h1>
                        </div>
                        <form  action="{{ route('register') }}" method="post" class="user">
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
                            <div class="form-group">
                                <input name="username" type="text" class="form-control form-control-user  @error('username') is-invalid @enderror" placeholder="username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user
                  @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Adresse Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Tel 2 --}}
                            <div class="form-group">
                                <input name="tel1" type="text" class="form-control form-control-user
                  @error('tel1') is-invalid @enderror" id="tel1" placeholder="Tel1">
                                @error('tel1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--      Tel 2 --}}
                            <div class="form-group">
                                <input name="tel2" type="text" class="form-control form-control-user
                  @error('tel2') is-invalid @enderror" id="tel2" placeholder="Tel2">
                                @error('tel2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--      lieu de naissance--}}
                            <div class="form-group">
                                <input name="lieuN" type="text" class="form-control form-control-user
                                     @error('lieuN') is-invalid @enderror" id="lieuN" placeholder="lieuN">
                                @error('lieuN')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--      date Naissance --}}
                            <div class="form-group">
                                <input name="dateN" type="date" class="form-control form-control-user
                  @error('dateN') is-invalid @enderror" id="dateN" placeholder="date Naissance">
                                @error('dateN')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--      Adress --}}
                            <div class="form-group">
                                <input name="address" type="text" class="form-control form-control-user
                  @error('address') is-invalid @enderror" id="address" placeholder="Address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--      Etat--}}
                            <div class="form-group">
                                <input name="etat" type="text" class="form-control form-control-user
                  @error('etat') is-invalid @enderror" id="etat" placeholder="Etat">
                                @error('etat')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                    {{-- idFonction  --}}
                            <div class="form-group text-center">

                                <select class="fonction custom-select" name="idFonction" id="idFonction" required>
                                    <option disabled> Select Fonction</option>

                                    @foreach( $fonctions as $fonction)
                                        <option value="{{ $fonction->id}}">{{ $fonction->nom}}</option>

                                    @endforeach

                                </select>
                            </div>

                            {{-- idDepot  --}}
                            <div class="form-group text-center">

                                <select class="depot custom-select" name="iddepot" id="iddepot" required>
                                    <option disabled > Select Depot</option>

                                    @foreach( $depots as $depot)
                                        <option value="{{ $depot->id}}">{{ $depot->nom}}</option>

                                    @endforeach

                                </select>
                            </div>

                            {{-- idgroupe  --}}
                            <div class="form-group text-center">

                                <select class="groupe custom-select" name="idgroupe" id="idgroupe" required>
                                    <option disabled > Select Group</option>

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
                                <input name="password_confirmation" type="password" class="form-control form-control-user"
                                       placeholder="Conform password">
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
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection
    @section('page-js-script')
{{--        <script>--}}
{{--        $('#depot').selectize();--}}
{{--        </script>--}}
</div>
    @endsection
