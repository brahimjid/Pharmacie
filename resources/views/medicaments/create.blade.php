@extends('layouts.admin')
@section('content')
    <h4 class="m-3 text-center text-dark" >Ajouter un médicament</h4>
    <hr class="w-50 border-bottom">
<div class="form-group w-50 m-auto">
    <form method="POST" action="{{ route('medicaments.store')}}">
        @csrf
        <label for="nom">nom :</label>
        <input type="text" class="form-control mb-2 @error('nom') is-invalid @enderror "
               name="nom" id="nom">
        @error('nom')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="prixAchat">prix Achat :</label>
        <input type="number" class="form-control mb-2 @error('prixAchat') is-invalid @enderror"
               name="prixAchat" id="prixAchat">
        @error('prixAchat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="prixVente">prix Vente :</label>
        <input type="number" class="form-control mb-2 @error('prixVente') is-invalid @enderror"
               name="prixVente" id="prixVente">
        @error('prixVente')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="familles">  Fammilles </label>
        <select class="familles" name="familles" id="familles">

            @foreach( $familles as $famille)
                <option value="{{$famille->id}}">{{$famille->nom}}</option>
                     {{$famille}}
                @endforeach

        </select>
        @error('familles')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="etat" class="mt-2"> Etat :</label>
        <input type="text" class="form-control mb-2  @error('etat') is-invalid @enderror"
               name="etat" id="etat">
        @error('etat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="pourcentage">Pourcentage :</label>
        <input type="number" class="form-control mb-2 @error('pourcentage') is-invalid @enderror"
               name="pourcentage" id="pourcentage">
        @error('pourcentage')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="seuil">seuil :</label>
        <input type="text" class="form-control mb-2 @error('seuil') is-invalid @enderror"
               name="seuil" id="seuil">
        @error('seuil')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
           <div class="d-flex justify-content-end mb-2" >
        <button type="submit" class="btn btn-success btn-block"  name="submit">
            Ajouter
        </button>
           </div>
    </form>
</div>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="familleM" tabindex="-1" role="dialog" aria-labelledby="familleMLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="familleMLabel">Add familles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="addF"></label>
                <form action="" method="post" id="fm-form">

                    <input type="text" name="nom-famille" id="nom-input" class="form-control">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" name="sumbit" class="btn btn-primary btn-sm">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
                            @section('page-js-script')
                            <script>

                                $(document).ready(function() {
                                    $('.familles').selectize({
                                        create: function(input,callback) {
                                            $('#familleM').modal('show');
                                            $('#nom-input').val(input);
                                            $('#fm-form').on('submit',function(e){
                                                e.preventDefault();
                                                $.ajax({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                    url:" {{ route('familles.store')}}",
                                                    method:"post",
                                                    dataType: 'json',
                                                    data:$("#fm-form").serialize(),

                                                    success: function (data) {
                                                        console.log(data.id);
                                                        console.log(data.nom);
                                                        callback({
                                                            value:data.id,
                                                            text : data.nom
                                                        });

                                                        $('#familleM').modal('toggle')

                                                    }
                                                });
                                            })


                                        }
                                    });

                                });
                            </script>

                            @endsection



