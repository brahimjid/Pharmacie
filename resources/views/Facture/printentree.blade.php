<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <title></title>
</head>
<body  class="bg-white" onload="window.print()">
<div class="container">
    <div class="row m-5 justify-content-around">
        <div class="col-8">
           <h2> Pharmacie </h2> <br>
            <div class="mb-2">
                <h5 class="font-italic d-inline"> Date : </h5> <span class="font-weight-bold">{{ $invoice->date}}</span>
            </div>
            <div>
              <h5 class="font-italic d-inline">   Fournisseur : </h5> <span class="nom-fournisseur font-weight-bold">{{ $invoice->fournisseur->nom  }}</span>
            </div>

        </div>
        <div class="col-4">
            <h5 class="d-inline font-weight-bolder">Facture N : </h5> <span class=""> {{ $invoice->numeroFactureAchat}}</span>
        </div>
    </div>
           <table class="table table-borderless mt-5">

               <thead class="border-bottom">
               <tr class="text-center">
                   <th scope="col" >Designation</th>
                   <th scope="col">prix Unitaire</th>
                   <th scope="col">quantite</th>
                   <th scope="col">prix Total</th>
               </tr>
               </thead>
               <tbody class="text-center text-dark">
{{--                        {{dd($meds)}}--}}

                           @foreach( $items as $item)
                                 <tr>
                                   <td>{{ $item->nom}}</td>
                                   <td> {{ $item->prixAchat }}</td>
                                   <td> {{ $item->quantite }}</td>
                                   <td> {{ $item->prixtotal }}</td>
                               </tr>
                       @endforeach


               </tbody>
               <tr class="">
                   <td colspan="3" class=""></td>
                   <td class="border-top text-dark">

                       <span class="font-weight-bold h4">Total:
                           <span class="font-weight-bold h4" id="total">{{ $invoice->montant}} UM</span>

                       </span>
                   </td>

               </tr>

           </table>
    </div>



</body>
</html>

