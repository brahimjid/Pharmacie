@extends('layouts.app')
@section('content')
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#high_qte">
            Open modal
        </button>
    The Modal
     <div class="modal fade" id="high_qte">
         <div class="modal-dialog modal-sm">
             <div class="modal-content model">

                 <!-- Modal Header -->
                 <div class="modal-header model__header">
                     <h4 class="modal-title model__title"><i class="fa fa-exclamation-triangle text-danger"></i></h4>
                     <button type="button" class="close model__button-cross" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Modal body -->
                 <div class="modal-body">
                     <span>La quantité ne doit pas depasser :</span>  <span class="current_qte font-weight-bold"></span>
                     {{--                <span class="model__dan">!</span>--}}
                 </div>

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary model__button" data-dismiss="modal">Close</button>
                 </div>


             </div>
         </div>
     </div>





@endsection
