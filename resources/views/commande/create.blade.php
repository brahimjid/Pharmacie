@extends('layouts.admin')
@section('content')
    <form action="{{ route('commandes.store')}}" method="post" id="add-stock-form" target="_blank">
        @csrf
        <div class="w-50 text-center m-auto commande_page">
            <label for="fournisseurs" class="mt-2">  Select Fournisseur </label>

            <select class="fournisseurs" name="fournisseurs" id="fournisseurs" required>
                <option disabled selected></option>
                @foreach( $fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id}}">{{$fournisseur->nom}}</option>

                @endforeach

            </select>
        </div>
        <div class="facture-wrapper shadow-lg mb-5">
            <div class="w-100 facture-view">
                <div class="form-group m-4 ">
                    <div class="row mt-3 justify-content-center">
{{--                        <div class="col-4 w-50">--}}
{{--                            <label class="mt-2" for="date">Date</label>--}}
{{--                            <input type="date" class="form-control"  name="dateFacture" id="date" required>--}}
{{--                        </div>--}}
{{--                        <div class="col-4 w-50">--}}
{{--                            <label class="mt-2" for="numf">N Facture</label>--}}
{{--                            <input type="text" class="form-control"  name="numerofacture" id="numf" required>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>


            <div class="shadow-sm" id="facture">

                <table class="table table-facture">

                    <thead>
                    <tr class="text-center">
                        <th scope="col" >Nom</th>
                        <th scope="col">prix Unitaire</th>
                        <th scope="col">quantite</th>
                        <th scope="col">prix Total</th>
                    </tr>
                    </thead>


                    <tbody id="facture_body" class="text-center">

                    </tbody>
                    <tr class="bg-light">
                        <td colspan="3" class="" rowspan=""></td>
                        <td>

                       <span class="font-weight-bold h4">Total:
                           <span class="font-weight-bold h4" id="total">0 UM</span>

                       </span>
                        </td>

                    </tr>
                    <tr>

                    </tr>

                </table>
                <input id="montantTotal" name="montant" type="hidden">
                <div class="d-flex  justify-content-center ">
                    <button type="submit" class="btn btn-primary mb-2" id="submit_invoice" name="submit_invoice">Valider
                        <span class="ml-2 fa fa-check-square submit-stock-btn"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="medsTable">
        <table class="medicamentstable table hover text-dark mt-5 text-center m-auto">
            <thead>
            <tr>
                <th scope="col" class="dpass">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">prix</th>
                <th scope="col"  style="width: 25%">Quantite</th>
                <th scope="col">Ajouter</th>
            </tr>
            </thead>

            <tbody class="stock_add_table">
            </tbody>
        </table>
    </div>


@endsection
@section('page-js-script')
    <script src="/js/popper.min.js"></script>
    <script src="/js/stock.js"></script>

    <script>
        $(document).off().on('submit','#add-stock-form',function(e){
            setTimeout(function(){
                location.reload();
            }, 3000);
        });
        let facture_wrapper =  $('.facture-wrapper').hide();
        let medsTable =$('.medsTable').hide();
        let fournisseurSelect = $('.fournisseurs');
        $(document).ready(function () {
            fournisseurSelect.on('change',function () {
                facture_wrapper.show();
                medsTable.show();
                $('.medicamentstable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('commandes.create')}}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'nom', name: 'nom'},
                        {data: 'prixAchat', name: 'prixAchat'},
                        {data: 'qte', name: 'qte'},
                        {data: 'add', name: 'add', orderable: false, searchable: false}
                    ],
                    "bDestroy": true,
                    "pageLength": 5,
                    "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [0] } ]
                    //"aoColumnDefs": [{ "bVisible": false, "aTargets": [0] }]

                });

            });

        });
    </script>
@endsection
