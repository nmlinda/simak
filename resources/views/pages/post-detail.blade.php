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
                <i class="fa fa-calendar"></i> {{ $post->updated_at->format('F d, Y') }}
                <i class="fa fa-clock-o"></i> {{ $post->updated_at->format('H:i') }}
              </p>
            </div>
          <div class="box-body">
            <img src="{{ asset('storage/'.$post->foto) }}" alt="" class="img-responsive" style="max-height:300px; display: block;margin-left: auto; margin-right: auto"><br>
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