@extends('layouts.admin')
@section('content')

{{--            <h3 class="text-center m-5">Stock List </h3>--}}
<form action="" method="get" id="add-stock-form">
    @csrf
    <input type="hidden" value="sortir" name="typeFacture">
    <div class="w-75 m-auto">
        <div class="form-group m-5 text-center">

            <label for="depot" class="mt-2 text-center">  <h4>Selectionner un Depot </h4> </label>

            <select class="depot" name="depot" id="depot" required>
                <option disabled selected></option>

                @foreach( $depots as $depot)
                    <option value="{{ $depot->id}}">{{$depot->nom}}</option>

                @endforeach

            </select>
        </div>
    </div>
</form>
<div class="table-wrapper">
    <table class="stockTable table hover text-dark mt-5">
        <thead class="text-center">
        <tr>
            <th scope="col" >Id</th>
            <th scope="col">Nom</th>
            <th scope="col">prix Achat</th>
            <th scope="col">prix Vente</th>
            <th scope="col">Quantite</th>
            <th scope="col">date de péremption </th>
            <th scope="col">Modifier </th>
        </tr>
        </thead>

        <tbody class="text-center">
        </tbody>
    </table>
</div>


@endsection
    @section('page-js-script')
    <script src="/custom.js"></script>
    <script src="/js/stock.js"></script>
                {{-- fetching all stock records   --}}
        <script>

           $(document).ready(function () {
               let table_wrapper=$('.table-wrapper').hide();
               let depotSelect =  $('#depot');
               depotSelect.selectize({
                   sortField: 'text'
               });
               depotSelect.on('change', function() {
                   table_wrapper.show();
               $('.stockTable').DataTable({
                   processing: true,
                   serverSide: true,
                   language:{
                       url:'//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json'
                   },
                   ajax: {
                       url:"{{ route('stocks.index')}}",
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       type: "get",
                       data: {depot:depotSelect.val()}


                   },
                   columns: [
                       {data: 'id', name: 'id'},
                       {data: 'nom', name: 'nom'},
                       {data: 'prixAchat', name: 'prixAchat'},
                       {data: 'prixVente', name: 'prixVente'},
                       {data: 'quantite', name: 'quantite'},
                       {data: 'datePeremption', name: 'datePeremption'},
                       {data: 'action', name: 'action', orderable: false, searchable: false}
                   ],
                   "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [0] } ],
                   "bDestroy": true,
                    "pageLength" : 7
               });

           });
           });


        </script>
        @endsection
