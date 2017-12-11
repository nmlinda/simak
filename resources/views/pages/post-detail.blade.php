@extends('templates.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('pages.post-semua') }}">Post semua</a></li>
        <li class="active">Detail post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      @if( $post->kategori == 'Pengumuman')
        <div class="box box-danger">
      @else
        <div class="box box-info">
      @endif
            
            <div class="box-header with-border">

              <h3><strong>{{ $post->judul }}</strong></h3>
                <p>
                  {{ $post->id_mahasiswa }}
                </p>
                <span>
                  @php
                    echo date('h:m d F Y', strtotime($post->update_at));
                  @endphp
                </span>
            </div>
          <div class="box-body">
             {!! $post->isi !!}
           </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-sm bg-navy">{{ $post->kategori }}</button>
            </div>
           <!-- /.box-footer-->
         </div>
          <!-- /.box -->
      
    </section>
    <!-- /.content -->
  
@endsection