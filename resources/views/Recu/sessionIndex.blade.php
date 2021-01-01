@extends('layouts.admin')
@section('content')
    <div class="date_picker" style="position:relative">
        <div class="form-row mb-3 justify-content-center align-items-center">
            <div class="col-md-4 mb-3">
                <label for="start_date">Date 1</label>
                <input type="date" class="form-control" name="start_date" id="start_date">
            </div>
            <div class="col-md-4 mb-3">
                <label for="end_date">Date 2</label>
                <input type="date" class="form-control"  name="end_date" id="end_date">
            </div>
            <div class="col-md-2 mt-3">
                <button class="btn btn-sm btn-primary filter_date">Ok</button>
            </div>

        </div>
    </div>

    <table class="sessionTable table hover text-dark mt-5 text-center">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">montant</th>
            <th scope="col">dateOverture</th>
            <th scope="col">dateFermeture</th>
            <th scope="col">Nom caissier</th>
            <th scope="col">Action</th>
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

        let sessionTable  =$('.sessionTable ');
        $(document).ready(function () {
            loadData();
            function loadData(from_date ='', to_date ='') {


                sessionTable .DataTable({
                    processing: true,
                    serverSide: true,
                    language:{
                        url:'//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json'
                    },
                    ajax: {
                        url: "{{ route('session.index')}}",
                        data: {first_date:from_date, second_date:to_date}
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'SUM(recu.montant)', name: 'SUM(recu.montant)'},
                        {data: 'dateouverture', name: 'dateouverture'},
                        {data: 'datefermeture', name: 'datefermeture'},
                        {data: 'fullName', name: 'fullName'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    "bDestroy": true,
                    "order": [[ 0, "desc" ]],
                    "pageLength": 5
                });
            }
            $('.filter_date').on('click',function () {
                let start_date = $('#start_date').val();
                let end_date =   $('#end_date').val();
                loadData(start_date, end_date);
            });
            let idSession;
            sessionTable.on('click','.delete',function () {
                idSession = $(this).attr('id');
                //console.log(idSession);
                $('#deleteRecuForm').attr('action', "/session/" + idSession);
                $('#deleteRecuModel').modal('show');

            });
        });


    </script>

@endsection
