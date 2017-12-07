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
      @if(!$posts)
        <div class="callout callout-info">
           <h4>Belum ada post tersedia.</h4>

           <p>Buat <a href="{{ route('pages.post-buat') }}">post</a> sekarang.</p>
        </div>
      @else
        @foreach ($posts as $post)
         <!-- Default box -->
         <div class="box box-info">
           <div class="box-header with-border">

              <h3><strong>{{ $post->judul }}</strong></h3>
               <p>
                Nama
               </p>
                <span>19.00 17 Nov</span>
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