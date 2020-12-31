@extends('layouts.admin')
@section('content')
    <div class="msg">

    </div>
    <table class="facturesTable table hover text-dark mt-5">
        <thead>
        <tr>
            <th scope="col">N Facture</th>
            <th scope="col">Date</th>
            <th scope="col">Montant</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
    <!-- Modal delete Invoice -->
    <div class="modal fade" id="deleteInvoiceModel" tabindex="-1" role="dialog" aria-labelledby="deleteInvoice" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteInvoice">Delete Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Are You Sure ??
                </div>
                <div class="modal-footer">

                    <form action="" method="post" class="d-inline" id="deleteInvoiceForm">
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
    <script src="/js/facture.js"></script>
    <script>
        $(document).ready(function () {

            let tableFacture =$('.facturesTable');
            tableFacture.DataTable({
                processing: true,
                serverSide: true,
                language:{
                    url:'//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json'
                },
                ajax: "{{ route('PrintStockSortir')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'date', name: 'date'},
                    {data: 'montant', name: 'montant'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                "pageLength": 5,
                order: [[ 0, 'desc' ]]
            });
            let idFacture;
            tableFacture.on('click','.delete',function () {
                idFacture = $(this).attr('id');
                console.log(idFacture);
                $('#deleteInvoiceForm').attr('action', "/invoices/" + idFacture);
                $('#deleteInvoiceModel').modal('show');

            });
        });
    </script>
@endsection

