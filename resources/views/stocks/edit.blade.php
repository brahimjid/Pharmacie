@extends('layouts.admin')
@section('content')
    <form action="{{ route('stocks.update',$stock->id)}}" method="post">
        @csrf
        <label for="prixAchat">prixAchat :</label>
        <input type="text" class="form-control mb-2 @error('prixAchat') is-invalid @enderror"
               name="prixAchat" id="prixAchat" value="{{ $stock->prixAchat}}">
        @error('prixAchat')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <label for="prixVente"> Prix Vente :</label>
        <input type="text" class="form-control mb-2 @error('prixVente') is-invalid @enderror"
               name="prixVente" id="prixVente" value="{{ $stock->prixVente}}">
        @error('prixVente')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        <input type="hidden" name="_method" value="PUT">
        <div class="d-flex align-content-center w-50 m-auto">


        <input type="submit" class="btn btn-success btn  m-2 " value="submit" name="submit">
        </div>
    </form>

@endsection
