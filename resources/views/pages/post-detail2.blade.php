@extends('templates.homepage')

@section('content')

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
                    <a href="{{ route('pages.post-detail', $post) }}"><h3><strong>{{ $post->judul }}</strong></h3></a>
                    <div class="pull-right">{{ $post->updated_at->format('F d, Y - H:i') }}</div>
                </div>
            <div class="box-body">
            <img src="{{ asset('storage/'.$post->foto) }}" alt="" class="img-responsive" style="display: block;margin-left: auto; margin-right: auto"><br>
              
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