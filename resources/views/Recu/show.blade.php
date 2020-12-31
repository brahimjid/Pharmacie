@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row m-5 justify-content-around">
        <div class="col-8">
            <h2> Pharmacie </h2> <br>
            <div class="mb-2">
                <h5 class="font-italic d-inline"> Date : </h5> <span class="font-weight-bold">{{$detail->date}}</span>
            </div>
            <div class="mb-2">
                <h5 class="font-italic d-inline">   Nom patient : </h5>
                <span class="nom-fournisseur font-weight-bold"></span>
            </div>
            <div>
                <h5 class="font-italic d-inline">   N patient : </h5>
                <span class="nom-fournisseur font-weight-bold"></span>
            </div>

        </div>
        <div class="col-4">
            <h5 class="d-inline font-weight-bolder">Recu N : </h5> <span class="">{{$detail->id}} </span>
        </div>
    </div>
    <table class="table table-borderless mt-5">

        <thead class="border-bottom">
        <tr class="text-center">
            <th scope="col" >Nom</th>
            <th scope="col">quantite</th>
            <th scope="col">prix Unitaire</th>
            <th scope="col">prix Total</th>
        </tr>
        </thead>
        <tbody class="text-center text-dark">

        @foreach( $elements as $element)
            <tr>
                <td>{{ $element->nom}}</td>
                <td> {{ $element->quantite }}</td>
                <td> {{ $element->prix }}</td>
                <td> {{ $element->prixtotal }}</td>
            </tr>
        @endforeach


            </tbody>
            <tr class="">
                <td colspan="3" class=""></td>
                <td class="border-top text-dark">

                           <span class="font-weight-bold h4">Total:
                               <span class="font-weight-bold h4" id="total"> {{$detail->montant}}UM</span>

                           </span>
                </td>

            </tr>

        </table>
    </div>

    @endsection
