@extends('layouts.admin')
@section('content')
    @include('inc.qteModal')
    <div class="facture-wrapper shadow-lg mb-5 sortir_page">
        <form action="{{ route('invoices.store')}}" method="post" id="add-stock-form" target="_blank">
            @csrf
            <input type="hidden" value="sortir" name="typeFacture">
            <div class="w-100 facture-view">
                <div class="form-group m-4 text-center pb-5">

                    <label for="depot" class="mt-2">  <h4>Selectionner un depot </h4> </label>

                    <select class="depot w-50 m-auto" name="depot" id="depot" required>
                        <option disabled selected></option>

                        @foreach( $depots as $depot)
                            <option value="{{ $depot->id}}"> {{$depot->nom}}</option>

                        @endforeach

                    </select>
                </div>
            </div>


            <div class="shadow-sm" id="facture">
                    <div class="facture-body">
                <table class="table table-facture">
                    <thead>
                    <tr class="text-center">
                        <th scope="col" >Designation</th>
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
    </div>
   <div class="medstableWrapper">
    <table class="medicamentstable table hover text-dark mt-5 text-center m-auto">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">prixVente</th>
            <th scope="col">C.Qte</th>
            <th scope="col">qte</th>
            <th scope="col">Add</th>
        </tr>
        </thead>

        <tbody class="stock_add_table">
        </tbody>
    </table>
   </div>


@endsection
@section('page-js-script')
    <script src="/js/custom.js"></script>
    <script src="/js/stock.js"></script>
    <script>
        $(document).off().on('submit','#add-stock-form',function(e){
            setTimeout(function(){
                location.reload();
            }, 3000);
        });
       $(document).ready(function () {
          let medsTable = $('.medstableWrapper').hide();
          let facture_body = $('.facture-body').hide();
           let depotSelect =  $('#depot');
           depotSelect.selectize({
               sortField: 'text'
           });
           depotSelect.on('change', function() {
               medsTable.show();
               facture_body.show();
               $('.medicamentstable').DataTable({
                   processing: true,
                   serverSide: true,
                   ajax: "{{ route('sortir')}}",
                   columns: [
                       {data: 'idMedicament', name: 'idMedicament',searchable: false},
                       {data: 'nom', name: 'nom'},
                       {data: 'prixVente', name: 'prixAchat',searchable: false},
                       {data: 'quantite', name: 'quantite',searchable: false},
                       {data: 'qte', name: 'quantite',searchable: false},
                       {data: 'add', name: 'add', orderable: false, searchable: false}
                   ],
                   "bDestroy": true,
                   "order": [[ 0, "desc" ]],
                   "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [0] } ]
               });
           });




       });

    </script>
@endsection
