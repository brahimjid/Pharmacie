@extends('layouts.admin')
@section('content')
{{--    <img src="{{ asset('img/loading.gif')}}" alt="loader" class="loader-img">--}}

    <div class="body-content">
        <h4 class="m-3 text-center text-dark" >liste des médicaments</h4>
        <hr class="w-50 border-bottom">
        <table class="medicamentstablek table hover text-dark mt-5 text-center">
        <thead>
        <tr>
            <th scope="col" class="dpass">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">prixAchat</th>
            <th scope="col">prixVente</th>
            <th scope="col">Famille</th>
            <th scope="col">etat</th>
            <th scope="col">pourcentage</th>
            <th scope="col">modifier</th>
            <th scope="col">supprimer</th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>

    <!-- Modal delete Medicaments -->
    <div class="modal fade" id="deleteMedsModel" tabindex="-1" role="dialog" aria-labelledby="deleteMedsModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger m-auto" id="deleteMedsModelLabel">supprimer un médicament</h4>

                </div>
                <div class="modal-body text-center">
                    Etes-vous sûr que vous voulez supprimer??
                </div>
                <div class="modal-footer">

                    <form action="" method="post" class="d-inline" id="deleteMedsForm">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-success btn-sm">Oui</button>
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
         </div>
    </div>
  @endsection
    @section('page-js-script')
          <script src="/js/custom.js"></script>
        <script>
             let tableMeds =$('.medicamentstablek');
            $(document).ready(function () {
                    tableMeds.DataTable({
                        processing: true,
                        serverSide: true,
                        language:{
                            url:'//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json'
                        },
                        ajax: "{{ route('medicaments.index')}}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'nom', name: 'nom'},
                            {data: 'prixAchat', name: 'prixAchat'},
                            {data: 'prixVente', name: 'prixVente'},
                            {data: 'famille.nom', name: 'famille'},
                            {data: 'etat', name: 'etat'},
                            {data: 'pourcentage', name: 'pourcentage'},
                            {data: 'edit', name: 'edit'},
                            {data: 'delete', name: 'delete'}

                        ],

                        "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [0] } ]
                    });



                let idMed;
                tableMeds.on('click','.delete',function () {
                    idMed = $(this).attr('id');
                    console.log(idMed);
                    $('#deleteMedsForm').attr('action', "/medicaments/" + idMed);
                    $('#deleteMedsModel').modal('show');

                });
            });


        </script>

            <script type="text/javascript">

        </script>


@endsection
