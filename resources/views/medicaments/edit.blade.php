@extends('layouts.admin')
@section('content')
    <h4 class="m-3 text-center text-dark" >Modifier un médicament</h4>
    <hr class="w-50 border-bottom">
    <div class="form-group w-50 m-auto">
        <form method="POST" action="/medicaments/{{ $medicament->id}}">
            @csrf
            <label for="nom">nom :</label>
            <input type="text" class="form-control mb-2 @error('nom') is-invalid @enderror"
                   name="nom" id="nom" value="{{$medicament->nom}}">
            @error('nom')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="prixAchat">prix Achat :</label>
            <input type="number" class="form-control mb-2 @error('prixAchat') is-invalid @enderror"
                   name="prixAchat" id="prixAchat" value="{{$medicament->prixAchat}}">
            @error('prixAchat')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="prixVente">prix Vente :</label>
            <input type="number" class="form-control mb-2 @error('prixVente') is-invalid @enderror"
                   name="prixVente" id="prixVente" value="{{$medicament->prixVente}}">
            @error('prixVente')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <select class="familles" data-container="body" data-live-search="true" name="familles">

                <option selected  value="{{ $medicament->idfamille }}">
                    @foreach($familleNom as $Nom)
                    {{ $Nom->nom}}

                        @endforeach
                </option>
                @foreach( $familles as $famille)
                    <option value="{{$famille->id}}">{{$famille->nom}}</option>

                @endforeach

            </select>
            @error('familles')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="etat"> Etat :</label>
            <input type="text" class="form-control mb-2 @error('etat') is-invalid @enderror"
                   name="etat" id="etat" value="{{$medicament->etat}}">
            @error('etat')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="pourcentage">Pourcentage :</label>
            <input type="number" class="form-control mb-2 @error('pourcentage') is-invalid @enderror"
                   name="pourcentage" id="pourcentage" value="{{$medicament->pourcentage}}">
            @error('pourcentage')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="seuil">seuil :</label>
            <input type="text" class="form-control mb-2 @error('seuil') is-invalid @enderror"
                   name="seuil" id="seuil" value="{{$medicament->seuil}}">
            @error('seuil')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <div class="d-flex justify-content-center ">
                <input type="hidden" name="_method" value="PUT">
                <input type="submit" class="btn btn-success btn btn-block m-2 " value="Modifier" name="submit">
            </div>
        </form>
    </div>
    @endsection

        @section('page-js-script')
            <script>
                $('.familles').selectize();
            </script>

        @endsection


