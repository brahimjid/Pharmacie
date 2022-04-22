@extends('layouts.admin')
@section('content')
    @include('inc.modal')
    <form action="{{ route('invoices.store')}}" method="post" id="add-stock-form">
        <input type="hidden" value="entree" name="type-facture">

        @csrf

        <div class="w-50 text-center m-auto entree_page">
            <label for="fournisseurs" class="mt-2">  <h4>Fournisseur </h4> </label>
            <select class="fournisseurs" name="fournisseurs" id="fournisseurs" required>
                    <option selected value="{{ $fournisseur->id}}">
                        {{ $fournisseur->nom}}
                    </option>
            </select>
        </div>
        <div class="facture-wrapper shadow-lg mb-5">
            <div class="w-100 facture-view">
                <div class="form-group m-4 ">
                    <div class="row mt-3 justify-content-center">
                        <div class="col-4 w-50">
                            <label class="mt-2" for="date">Date</label>
                            <input type="date" class="form-control"  name="dateFacture" id="date" required>
                        </div>
                        <div class="col-4 w-50">
                            <label class="mt-2" for="numf">N Facture</label>
                            <input type="text" class="form-control"  name="numerofacture" id="numf" required>
                        </div>
                    </div>
                </div>
            </div>


            <div class="shadow-sm" id="facture">

                <table class="table table-facture">

                    <thead>
                    <tr class="text-center">
                        <th scope="col"  style="width: 30%">Nom</th>
                        <th scope="col">prix Unitaire</th>
                        <th scope="col"style="width: 10%" >quantite</th>
                        <th scope="col">Date Peremption</th>
                        <th scope="col">prix Total</th>
                    </tr>
                    </thead>


                    <tbody id="facture_body" class="text-center">
                    @foreach( $commandeItems as $commandeItem)
                    <tr id="${med_id}" class="input_center_text">
                        <td>
                           {{ \Illuminate\Support\Facades\DB::table('medicaments')->where('id',$commandeItem->idMedicament)->value('nom') }}
                            <input type="hidden" class="form-control" name="nom-med[]" id="prix_input"
                                   value="{{ \Illuminate\Support\Facades\DB::table('medicaments')->where('id',$commandeItem->idMedicament)->value('nom') }}" >
                        </td>
                        <td>
                            <input type="text" class="form-control" name="prix_achat[]" id="prix_input"
                                   value="{{ number_format((float)$commandeItem->prix, 2, '.', '')}}" >
                        </td>
                        <td>
                            <input type="number" class="form-control" name="Qte[]" id="qte_input" value="{{ $commandeItem->quantite}}">
                        </td>
                        <td>
                            <input type="date"  class="form-control" name="date_per[]" id="date_per">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="pT[]" id="prixT_input"
                                   value="{{ number_format((float)$commandeItem->prixtotal, 2, '.', '')}}">
                        </td>
                        <td>
                            <input type="hidden"  class="form-control" name="med_pour[]" id="med_pour"
                                   value="{{ \Illuminate\Support\Facades\DB::table('medicaments')->where('id',$commandeItem->idMedicament)->value('pourcentage') }}" >
                        </td>
                        <td>
                            <input type="hidden"  class="form-control" name="med_id[]" id="med_id" value="{{ $commandeItem->idMedicament}}">
                        </td>
                        <td>
                            <span class="remove_row btn btn-sm btn-danger" title="Remove row" style="cursor: pointer">
                                X
                            </span>
                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                    <tr class="bg-light">
                        <td colspan="3" class="" rowspan=""></td>
                        <td>

                       <span class="font-weight-bold h5" id="total">Total:
                           {{ number_format($commande->montant, 2,'.', '' )}} UM

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
@endsection
@section('page-js-script')
    <script>
        $(document).ready(function () {
            $('#submit_invoice').on('click',function (e) {
                if( $('.table-facture #facture_body tr').length ===0){
                    e.preventDefault();
                }

            });

        $('.fournisseurs').selectize({
            sortField: 'text'
        });
        let table_facture = $('.table-facture');
        // call montant total function
        total();
        // call remove row  function
        removeRow();
        // call on change function
        onchange();
        // montant total function
        function total() {

            let montant_Total = 0;
            table_facture.find('td #prixT_input').each(function () {
                let prixTotal = $(this).val() - 0;
                montant_Total = montant_Total + prixTotal;
            });
            $('#total').html(montant_Total + ' UM');
            $('#montantTotal').val(montant_Total);
        }

        //remove row function
        function removeRow() {
            table_facture.on('click', '.remove_row', function () {
                $(this).closest('tr').remove();
                total()
            });
        }
        // add listener on inputs prix and quantite
        function onchange(){
            table_facture.delegate('#prix_input ,#qte_input','keyup',function(){
                let prix_input = $(this).closest('tr').find('#prix_input').val();
                let qte_input = $(this).closest('tr').find('#qte_input').val();
                $(this).closest('tr').find('#prixT_input').val(prix_input * qte_input);
                total();

            });
        }

        });
    </script>
    @endsection
