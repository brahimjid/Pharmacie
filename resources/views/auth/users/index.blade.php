@extends('layouts.admin')
@section('content')

    <table class="medicamentstablek table hover text-dark mt-5 text-center">
        <thead>
        <tr>
            <th scope="col" class="dpass">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">UserName</th>
            <th scope="col">Email</th>
            <th scope="col">Tel 1 </th>
            <th scope="col">Tel 2</th>
            <th scope="col">date de Naissance</th>
            <th scope="col">Lieu de Naissance </th>
            <th scope="col">modifier</th>
            <th scope="col">supprimer</th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>

    <!-- Modal delete Usericaments -->
    <div class="modal fade" id="deleteUsersModel" tabindex="-1" role="dialog" aria-labelledby="deleteUsersModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUsersModelLabel">Supprimer l'utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Etes-vous sûr que vous voulez supprimer??
                </div>
                <div class="modal-footer">

                    <form action="" method="post" class="d-inline" id="deleteUsersForm">
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
        let tableUsers =$('.medicamentstablek');
        $(document).ready(function () {
            tableUsers.DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index')}}",
                columns: [
                    // nom
                    // prenom
                    // username
                    // email
                    // password
                    // idFonction
                    // tel1
                    // tel2
                    // lieuNaissance
                    // dateNaissance
                    // adresse
                    {data: 'id', name: 'id'},
                    {data: 'nom', name: 'nom'},
                    {data: 'prenom', name: 'prenom'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'tel1', name: 'tel1'},
                    {data: 'tel2', name: 'tel2'},
                    {data: 'dateNaissance', name: 'dateNaissance'},
                    {data: 'adresse', name: 'adresse'},
                    {data: 'edit', name: 'edit'},
                    {data: 'delete', name: 'delete'}

                ],
                "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [0] } ]
            });
            let idUser;
            tableUsers.on('click','.delete',function () {
                idUser = $(this).attr('id');
                console.log(idUser);
                $('#deleteUsersForm').attr('action', "/users/" + idUser);
                $('#deleteUsersModel').modal('show');

            });
        });

    </script>

@endsection
