@extends('layouts.admin')
@section('content')
    @include('inc.modal')
    @include('inc.qteModal')

    <div class="cards recu_page">
        <div class="m-auto  w-50 cards__montant ">
            <div class="info-recu  row mb-5">
                <div class="col-6 mt-2">Montant Total: </div>
                <div class="col-6 mt-2"> id Session :</div>

                <div class="col-6 mt-2 mb-2"> <span class="font-weight-bold">{{ $session_montant}} UM</span> </div>
                <div class="col-6 mt-2 mb-2"> {{ $session_id }}</div>

            </div>
        </div>

    </div>

        <form action="{{ route('recu.store')}}" method="post" id="add-stock-form" target="_blank">
            @csrf

            <div class="shadow-sm _page sortir_page" id="facture" >
                <div class="facture-body mb-5">
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

        <div class="form-row mb-3 justify-content-center">
            <div class="col-md-4 mb-3">
                <label for="num_patient">N patient</label>
                <input type="text" class="form-control" name="num_patient" id="num_patient">
            </div>
            <div class="col-md-4 mb-3">
                <label for="nom_patient">Nom</label>
                <input type="text" class="form-control" name="nom_patient" id="nom_patient"  required>
            </div>
        </div>
        </form>
        <table class="medicamentstable table hover text-dark mt-5 text-center m-auto">
            <thead>
            <tr>
                <th scope="col" class="dpass">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">prix</th>
                <th scope="col">C.Qte</th>
                <th scope="col" class="dpass">pour</th>
                <th scope="col">qte</th>
                <th scope="col">Add</th>
            </tr>
            </thead>

            <tbody class="stock_add_table">
            </tbody>
        </table>




@endsection
@section('page-js-script')
    <script src="/custom.js"></script>
    <script src="/js/stock.js"></script>
    <script>
        $(document).off().on('submit','#add-stock-form',function(e){
            setTimeout(function(){
                location.reload();
            }, 3000);
        });
        $(document).ready(function () {

                $('.medicamentstable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('recu.create')}}",
                    columns: [
                        {data: 'idMedicament', name: 'idMedicament'},
                        {data: 'nom', name: 'nom'},
                        {data: 'prixVente', name: 'prixAchat'},
                        {data: 'quantite', name: 'quantite'},
                        {data: 'pourcentage', name: 'pourcentage'},
                        {data: 'qte', name: 'quantite'},
                        {data: 'add', name: 'add', orderable: false, searchable: false}
                    ],
                    "bDestroy": true,
                    "pageLength": 5,
                    "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [ 0,4 ] } ]

                });








        });

    </script>
@endsection
