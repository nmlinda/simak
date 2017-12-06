@extends('templates.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Semua Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Semua Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      @foreach ($posts as $post)
        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
           
            <h3><strong>{{ $post->judul }}</strong></h3>
             <p>Minggu, 18 Desember 2017<br>19.00</p>
      
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

    </section>
    <!-- /.content -->
  
@endsection