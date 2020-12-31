//
//
// // Add to stock
// $(document).ready(function () {
// $(".medicamentstables").on("click", ".add_med_to_stock_btn", function(){
//     if ($('.sortir_page').length){
//         alert('sortir')
//     }
//     let  med_id = $(this).closest('tr').find('td:eq(0)').text();
//     let nom_med   = $(this).closest('tr').find('td:eq(1)').text();
//     let prixVente =  $(this).closest('tr').find('td:eq(2)').text();
//     let med_prt  =  $(this).closest('tr').find('td:eq(4)').text();
//     let current_qte = $(this).closest('tr').find('td:eq(3)').text();
//     let qte = $(this).closest('tr').find('#qtes').val();
//     let pt =Number (qte * prixVente);
//     // ajax to validate stock
//     // $.ajax({
//     //     headers: {
//     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     //     },
//     //     url:"/stocks",
//     //     method:"post",
//     //     dataType: 'json',
//     //     data:{med_id:med_id,qte:qte},
//         //success: function (data) {
//             // check if data exist
//             if (qte <= current_qte){
//
//                 // clear quantity and date  fields
//                $('.stock_add_table').find('input').val('');
//                 // append value to invoice
//                 // $('#facture_body').append(
//                 //     `
//                 //         <tr>
//                 //                <td>
//                 //                 <input type="text" class="form-control" name="nom-med[]" id="nom_meds" value="${nom_med}" >
//                 //                 </td>
//                 //                <td> <input type="text" class="form-control" name="prix_achat[]" id="prix_achat" value="${prixVente}" ></td>
//                 //                <td> <input type="number" class="form-control" name="Qte[]" id="Qte" value="${qte}"></td>
//                 //
//                 //                <td> <input type="text" class="form-control" name="pT[]" id="prixT" value="${pt}"></td>
//                 //                <td>
//                 //                 <input type="hidden"  class="form-control" name="med_id[]" id="med_id" value="${med_id}">
//                 //              </td>
//                 //               <td>
//                 //             <input type="hidden"  class="form-control" name="med_pour[]" id="med_pour" value="${med_prt}">
//                 //             </td>
//                 //              <td>
//                 //
//                 //              </td>
//                 //               <td>
//                 //                <span class="remove_row btn btn-sm btn-danger">X</span>
//                 //              </td>
//                 //
//                 //         </tr>
//                 //         `
//                 // );
//                 // invoice Total script
//                 let montant_Total = 0;
//                 let table_facture = $('.table-facture');
//                 table_facture.find('td #prixT').each(function () {
//                     let prixT = $(this).val()-0;
//                     montant_Total = montant_Total + prixT;
//                 });
//                 // ##  remove row
//                 table_facture.on('click','.remove_row',function () {
//                     let tr = $(this).closest('tr');
//                     let prixT =  tr.find('#prixT').val();
//                     tr.remove();
//                     montant_Total = montant_Total-prixT ;
//                     $('#total').html(montant_Total + ' UM');
//                     $('#total_input').val(montant_Total);
//                 });
//                 // append invoice total  Value
//                 $('#total').html(montant_Total + ' UM');
//                 // append to hidden  input montant
//                 $('#total_input').val(montant_Total);
//
//             }
//             else
//                 alert('low Qte ');
//     //     }
//     // });
//
//
//
//
//
//
//
// });
// });
