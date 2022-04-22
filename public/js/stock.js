
$('.fournisseurs').selectize({
    sortField: 'text'
});

  $('#submit_invoice').on('click',function (e) {
  if( $('.table-facture #facture_body tr').length ===0){
           e.preventDefault();
  }

  });
let factureTable =$('#facture_body');
 // add elements to facture table
$(".medicamentstable").on("click", ".add_med_to_stock_btn", function(e){
       // get value from table medicament and assign them to variables

    let med_id = $(this).closest('tr').find('td:eq(0)').text(),
        nom_med = $(this).closest('tr').find('td:eq(1)').text(),
        prix_achat = $(this).closest('tr').find('td:eq(2)').text(),
        med_pourcentage = $(this).closest('tr').find('td:eq(4)').text(),
        date_peremption = $(this).closest('tr').find('#date_peremption_input').val(),
        new_prix_achat = $(this).closest('tr').find('#new_prix_input').val(),
        datePeremption_inpute = $(this).closest('tr').find('#date_peremption_input'),
        quantite = $(this).closest('tr').find('#quantite_input').val(),
        quantite_inpute = $(this).closest('tr').find('#quantite_input'),
         repeated_entries =0,
        prixTotal =Number (quantite * prix_achat);
    verifyMedsExistence();
      // validate quantite and date peremption
     if ($('.entree_page').length){

         if(new_prix_achat.length!==0){
             prix_achat = new_prix_achat;

         }
   if (quantite.length === 0 && date_peremption.length === 0 ){
       // add red border
       quantite_inpute.addClass('border-danger');
       datePeremption_inpute.addClass('border-danger');
   }
   else if (date_peremption.length === 0){
       // add red border to indicate that the field is empty
       datePeremption_inpute.addClass('border-danger');
   }
   else if (quantite.length === 0){
    // add red border

       quantite_inpute.addClass('border-danger');
   }

   else {
       $('.medicamentstable').find('input').val('');
       quantite_inpute.removeClass('border-danger');
       datePeremption_inpute.removeClass('border-danger');

       // append value to facture table

      // if (verifyMedsExistence()===true){
      //if(repeated_entries===0) {
        if (verifyMedsExistence()===true) {
       factureTable.append(
           `
            <tr id="${med_id}">
                   <td>
                      <input type="text" class="form-control" name="nom-med[]" id="nom_meds" value="${nom_med}" >
                    </td>
                   <td>

                     <input type="text" class="form-control" name="prix_achat[]" id="prix_input" value="${prix_achat}" ></td>
                   <td>
                      <input type="number" class="form-control" name="Qte[]" id="qte_input" value="${quantite}"></td>

                   <td> <input type="text" class="form-control" name="pT[]" id="prixT_input" value="${prixTotal}"></td>
                   <td>
                      <input type="hidden"  class="form-control" name="med_id[]" id="med_id" value="${med_id}">
                 </td>

                  <td>
                    <input type="hidden"  class="form-control" name="date_per[]" id="date_per" value="${date_peremption}">
                 </td>
                 <td>
                    <input type="hidden"  class="form-control" name="med_pour[]" id="med_pour" value="${med_pourcentage}">
                 </td>
                  <td>
                    <button class="remove_row btn btn-sm btn-danger" title="Remove row">
                     X
                    </button>
                 </td>

            </tr>
            `
       );


  }

   }
     }

       // ############################  when where in  page sortir Or recu   ############################
       else if ($('.sortir_page').length || $('.recu_page').length) {
           let prixVente =  $(this).closest('tr').find('td:eq(2)').text();
         let current_qte = Number($(this).closest('tr').find('td:eq(3)').text());
         if (quantite <= current_qte){
      if (quantite.length === 0){
             // add red border
             quantite_inpute.addClass('border-danger');
         }
     else {
          $('.medicamentstable').find('input').val('');
          quantite_inpute.removeClass('border-danger');
          if (verifyMedsExistence()===true){
           factureTable.append(
               `<tr id="${med_id}">
                               <td>
                                <input type="text" class="form-control" name="nom-med[]" id="nom_meds" value="${nom_med}" >
                                </td>
                               <td> <input type="text" class="form-control" name="prix_achat[]" id="prix_input" value="${prixVente}" oninput="validity.valid||(value=\'\');"></td>
                               <td> <input type="number" class="form-control" name="Qte[]" id="qte_input" value="${quantite}" oninput="validity.valid||(value=\'\');"></td>
                               <td> <input type="text" class="form-control" name="pT[]" id="prixT_input" value="${prixTotal}" oninput="validity.valid||(value=\'\');"></td>
                               <td>
                                <input type="hidden"  class="form-control" name="med_id[]" id="med_id" value="${med_id}" oninput="validity.valid||(value=\'\');">
                             </td>
                              <td>
                            <input type="hidden"  class="form-control" name="med_pour[]" id="med_pour" value="${med_pourcentage}">
                            <input type="hidden"  class="form-control" name="date_per[]" id="date_per" value="${$(this).attr('data-date')}">
                            </td>
                             <td>
                            <button class="remove_row btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Remove row">
                             X
                            </button>
                             </td>
                        </tr>
                        `
           );
              }

     }
         }
         else{
             $('#high_qte').modal('show');
             $('.current_qte').text(current_qte);

         }
             //alert('La quantité ne doit pas depasser : ' + current_qte)
       }
       // commande
       else if ($('.commande_page').length){
             if (quantite.length === 0){
             // add red border
             quantite_inpute.addClass('border-danger');
         }
             else {
                 $('.medicamentstable').find('input').val('');
                 quantite_inpute.removeClass('border-danger');
                 factureTable.append(
                     `
                        <tr id="${med_id}">
                               <td>
                                <input type="text" class="form-control" name="nom-med[]" id="nom_meds" value="${nom_med}" >
                                </td>
                               <td> <input type="text" class="form-control" name="prix_achat[]" id="prix_input" value="${prix_achat}" oninput="validity.valid||(value=\'\');"></td>
                               <td> <input type="number" class="form-control" name="Qte[]" id="qte_input" value="${quantite}" oninput="validity.valid||(value=\'\');"></td>

                               <td> <input type="text" class="form-control" name="pT[]" id="prixT_input" value="${prixTotal}" oninput="validity.valid||(value=\'\');"></td>
                               <td>
                                <input type="hidden"  class="form-control" name="med_id[]" id="med_id" value="${med_id}" oninput="validity.valid||(value=\'\');">
                                </td>
                              <td>
                              <button type="button" class="remove_row btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Remove row">
                                    X
                              </button>
                             </td>

                        </tr>
                        `
                 );
             }

     }

       // call montant total function
       total();

       // call remove row  function
       removeRow();
       // call on change function
       onchange();




       // montant total function
       function total() {

           let montant_Total = 0;
           let table_facture = $('.table-facture');
           table_facture.find('td #prixT_input').each(function () {
               let prixTotal = $(this).val() - 0;
               montant_Total = montant_Total + prixTotal;
           });
           $('#total').html(montant_Total + ' UM');
           $('#montantTotal').val(montant_Total);
       }

        //remove row function
       function removeRow() {
           $('.table-facture').on('click', '.remove_row', function () {
               $(this).closest('tr').remove();
               total()
           });
       }
   // add listener on inputs prix and quantite
    function onchange(){
        factureTable.delegate('#prix_input ,#qte_input','keyup',function(){
            let prix_input = $(this).closest('tr').find('#prix_input').val();
            let qte_input = $(this).closest('tr').find('#qte_input').val();
            $(this).closest('tr').find('#prixT_input').val(prix_input * qte_input);
            total();

        });
    }
            function verifyMedsExistence(){
                 let tf = true;
                let tr = $('#facture_body tr');
                tr.each(function () {
                    if ($(this).attr('id') === med_id){
                        repeated_entries=1;
                        e.preventDefault();
                        $('#alreadyMeds').modal('show');
                        tf = false;
                        return tf;
                    }
                    else{
                        return tf;
                    }
                });
                return tf;
            }


});

    // ajax to insert stock
    // $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url:"/stocks",
    //         method:"post",
    //         dataType: 'json',
    //         data:{med_id:med_id,pr_achat:pr_achat,med_prt:med_prt,qte:qte,dateP:dateP},
    //         success: function (data) {
    //             // check if data inserted
    //            if (data.success==='updated' || data.success==='inserted'){
    //                // clear quantity and datep fields
    //                $('.stock_add_table').find('input').val('');
    //
    //            }
    //         }
    // });




