@extends('layouts.admin')
@section('content')
    <div class="msg">

    </div>
    <h4 class="m-3 text-center text-dark" >liste des factures entrées</h4>
    <hr class="w-50 border-bottom">

    <table class="facturesTable table hover text-dark mt-5 text-center">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Date</th>
            <th scope="col">Montant</th>
            <th scope="col">N Facture</th>
            <th scope="col">Imprimer</th>
            <th scope="col">Supprimer</th>
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
                    Etes-vous sûr que vous voulez supprimer ??
                </div>
                <div class="modal-footer">

                    <form action="" method="post" class="d-inline" id="deleteInvoiceForm">
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
                  ajax: "{{ route('invoices.index')}}",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'date', name: 'date'},
                      {data: 'montant', name: 'montant'},
                      {data: 'numeroFactureAchat', name: 'numeroFactureAchat'},
                      {data: 'print', name: 'print', orderable: false, searchable: false},
                      {data: 'delete', name: 'delete', orderable: false, searchable: false}
                  ],
                  order: [[ 0, 'desc' ]],
                  "pageLength": 7,
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

