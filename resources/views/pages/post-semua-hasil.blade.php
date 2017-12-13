@extends('templates.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Saya
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('pages.post-semua') }}">Semua post</a></li>
        <li class="active">Pencarian post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- search bar -->
      <form action="{{ route('pages.post-semua-hasil') }}" method="GET">
        <div class="form-group input-group input-group-lg">
          <input type="text" class="form-control" placeholder="Pencarian post.." name="cari">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-fw fa-search"></i></button>
          </span>
        </div>
      </form>
      
      <!-- hasil post content -->
      @if (count($keyword) > 0)
		  	@foreach ($keyword as $data)
          <!-- Default box -->
          @if( $data->kategori == 'Pengumuman')
            <div class="box box-danger">
          @else
            <div class="box box-info">
          @endif
            <!-- header box -->
            <div class="box-header with-border">
              <a href="{{ route('pages.post-detail', $data) }}"><h3><strong>{{ $data->judul }}</strong></h3></a>
              <span>
                {{ $data->updated_at->diffForHumans() }}
              </span>
            </div>

            <!-- box body -->
            <div class="box-body">
              {!! mb_strimwidth($data->isi, 0, 255, "...") !!}
            </div>
            <!-- /.box-body -->
            
            <!-- box footer -->
            <div class="box-footer">
              <button type="button" class="btn btn-sm bg-navy">{{ $data->kategori }}</button>
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->
        @endforeach
        {!! $keyword->render() !!}
			
	    @else 
		    <div class="callout callout-warning">
          <h4>Post tidak ditemukan.</h4>
          <p>Pastikan kata kunci anda benar.</p>
        </div>
		@endif
          
    </section>
    <!-- /.content -->
  
@endsection