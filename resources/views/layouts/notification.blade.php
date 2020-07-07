@if(session('success'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissable" role="alert" style="background-color: #00a680; color: #fff;">
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p class="mb-0"><i class="fa fa-check-circle"></i> {{session('success')}}</p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p class="mb-0"><i class="fa fa-info-circle"></i> {{session('error')}}</p>
        </div>
    </div>
@endif
@if($errors->any())
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach($errors->all() as $error)
                <p class="mb-0"><i class="fa fa-info-circle"></i> {{$error}}</p>
            @endforeach
        </div>
    </div>
@endif
