@extends('layouts.admin')
@section('content')
    <h4 class="m-3 text-center text-dark" >liste des commandes</h4>
    <hr class="w-50 border-bottom">
    <table class="commandesTable table hover text-dark mt-5 text-center">
        <thead>
        <tr>
{{--            <th scope="col" class="dpass">Id</th>--}}
            <th scope="col">id</th>
            <th scope="col">date</th>
            <th scope="col">montant</th>
            <th scope="col">modifier</th>
            <th scope="col">stocker</th>
            <th scope="col">supprimer</th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>

    <!-- Modal delete Medicaments -->
    <div class="modal fade" id="deleteCommandeModel" tabindex="-1" role="dialog" aria-labelledby="deleteCommandeModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCommandeModelLabel">supprimer un Commandes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Etes-vous sûr que vous voulez supprimer??
                </div>
                <div class="modal-footer">

                    <form action="" method="post" class="d-inline" id="deleteCommandeForm">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-success btn-sm">Oui</button>
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        let tableMeds =$('.commandesTable');
        $(document).ready(function () {
                tableMeds.DataTable({
                    processing: true,
                    serverSide: true,
                    language:{
                        url:'//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json'
                    },
                    ajax: "{{ route('commandes.index')}}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'date', name: 'date'},
                        {data: 'montant', name: 'montant'},
                        {data: 'edit', name: 'edit'},
                        {data: 'convert', name: 'convert'},
                        {data: 'delete', name: 'delete'}

                    ],
                    "pageLength": 7,
                    // "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [0] } ]
                });


            let idCommande;
            tableMeds.on('click','.delete',function () {
                idCommande = $(this).attr('id');
                console.log(idCommande);
                $('#deleteCommandeForm').attr('action', "/commandes/" + idCommande);
                $('#deleteCommandeModel').modal('show');

            });
        });


    </script>

@endsection
