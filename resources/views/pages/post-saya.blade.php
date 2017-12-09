@extends('templates.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Saya
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Post saya</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
      @if($postSaya->isEmpty())
        <div class="callout callout-info">
           <h4>Anda belum membuat post.</h4>
           <p>Buat <a href="{{ route('pages.post-buat') }}">post</a> sekarang.</p>
        </div>
        
      @else
        @foreach ($posts as $post)
         <!-- Default box -->
         @if( $post->kategori == 'Pengumuman')
            <div class="box box-danger">
         @else
            <div class="box box-info">
         @endif
            <div class="box-header with-border">
              <h3><strong>{{ $post->judul }}</strong></h3>
              <p>Minggu, 18 Desember 2017<br>19.00</p>
           
              <div class="box-tools pull-right btn-group">
                <form action="{{ route('pages.post-hapus', $post) }}" class="" method="post">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                   <a href="{{ route('pages.post-edit', $post) }}" class="btn btn-sm btn-primary">
                     <i class="fa fa-pencil-square-o"></i> Edit</a>
                   <button type="submit" class="btn btn-sm btn-danger">
                     <i class="fa fa-trash-o"></i> Hapus</button>   
                </form>
              </div>
            </div>

           <div class="box-body">
              {{ $post->isi }}
           </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-sm bg-navy">{{ $post->kategori }}</button>
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->
        @endforeach
      @endif

    </section>
    <!-- /.content -->
  
@endsection