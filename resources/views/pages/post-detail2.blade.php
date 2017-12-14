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
                <h3><strong>{{ $post->judul }}</strong></h3>
                    <p>
                    {{ $post->id_mahasiswa }}
                    </p>
                    <span>
                    {{ $post->updated_at->format('d F Y H:i') }}
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
          </div>
      </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  
@endsection