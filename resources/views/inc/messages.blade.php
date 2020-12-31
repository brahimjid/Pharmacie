@if ($errors->any())
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
        <strong>
            @foreach ( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>




    @endif
        @if(session('success'))
            <div class="alert text-center  alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


         @endif



