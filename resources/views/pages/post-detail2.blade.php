@extends('templates.homepage')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Detail post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
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
          </div>
      </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  
@endsection