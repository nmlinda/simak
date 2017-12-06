@extends('templates.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Semua Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Post saya</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
      @if(!$postSaya)
          <h1>gada</h1>
      @else
        @foreach ($posts as $post)
         <!-- Default box -->
          <div class="box box-info">
           <div class="box-header with-border">
           
              <h3><strong>{{ $post->judul }}</strong></h3>
              <p>Minggu, 18 Desember 2017<br>19.00</p>

             <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-primary">
                  <i class="fa fa-pencil-square-o"></i> Edit</button>
               <button type="button" class="btn btn-sm btn-danger">
                  <i class="fa fa-trash-o"></i> Hapus</button>
              </div>

           </div>
           <div class="box-body">
              {{ $post->isi }}
           </div>
            <!-- /.box-body -->
          <div class="box-footer">
            {{ $post->kategori }}
          </div>
          <!-- /.box-footer-->
        </div>
         <!-- /.box -->
       @endforeach
      @endif

    </section>
    <!-- /.content -->
  
@endsection