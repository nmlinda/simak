@if (session('success'))
  
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ session ('success') }}</h4>
    </div>
   
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        {{ session ('danger') }}
    </div>
@endif