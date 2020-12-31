@extends('layouts.admin')
@section('content')
    <div class="date_picker" style="position:relative">
        <div class="form-row mb-3 justify-content-center align-items-center">
            <div class="col-md-4 mb-3">
                <label for="start_date">Debut</label>
                <input type="date" class="form-control" name="start_date" id="start_date">
            </div>
            <div class="col-md-4 mb-3">
                <label for="end_date">Fin</label>
                <input type="date" class="form-control"  name="end_date" id="end_date">
            </div>
            <div class="col-md-2 mt-3">
                <button class="btn btn-sm btn-primary filter_date">Ok</button>
            </div>

        </div>
    </div>

    <table class="recuTable table hover text-dark mt-5 text-center">
        <thead>
        <tr>
            <th scope="col" >Id</th>
            <th scope="col">montant</th>
            <th scope="col">date</th>
            <th scope="col">idSession</th>
            <th scope="col">annulation</th>
            <th scope="col">détails</th>
            <th scope="col">annuler</th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>

    <!-- Modal delete Recu -->
    <div class="modal fade" id="deleteRecuModel" tabindex="-1" role="dialog" aria-labelledby="deleteRecuModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteRecuModelLabel">Delete Recu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Are You Sure ??
                </div>
                <div class="modal-footer">

                    <form action="" method="post" class="d-inline" id="deleteRecuForm">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-success btn-sm">Yes</button>
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
    <script src="/js/custom.js"></script>
    <script src="/js/recu.js"></script>
    <script>

        let recuTable =$('.recuTable');
        $(document).ready(function () {
            loadData();
            function loadData(from_date ='', to_date ='') {


                recuTable.DataTable({
                    processing: true,
                    serverSide: true,
                    language:{
                        url:'//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json'
                    },
                    ajax: {
                        url: "{{ route('recu.index')}}",
                        data: {first_date:from_date, second_date:to_date}
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'montant', name: 'montant'},
                        {data: 'date', name: 'date'},
                        {data: 'idSession', name: 'idSession'},
                        {data: 'annulation', name: 'annulation'},
                        {data: 'elements', name: 'elements'},
                        {data: 'annuler', name: 'annuler', orderable: false, searchable: false}

                        //
                    ],
                    "bDestroy": true,
                    "pageLength": 5
                });
            }
            $('.filter_date').on('click',function () {
                let start_date = $('#start_date').val();
                let end_date =   $('#end_date').val();
                loadData(start_date, end_date);
            });
            let idRecu;
            recuTable.on('click','.cancel-btn',function () {
                idRecu = $(this).attr('id');
                console.log(idRecu);
               $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   url:'/recu/annuler/' + idRecu,
                   type:"get",
                   //data:{id:idRecu},
                   success: function (data){
                        if(data ==='success'){
                       location.reload();
                       }

                   }

               })

            });
        });


    </script>

@endsection
