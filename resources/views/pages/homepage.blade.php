@extends('templates.homepage')

@section('content')
    <section class="content">
        <div class="boxx box-info" style="margin-right: 150px; margin-left: 150px;">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Seputar Asrama</h3>
            </div>
            <div class="box-body" style="padding-right: 150px; padding-left: 150px;">
            <div class="box box-danger">
                <div class="box-header with-border">Judul</div>
                <div class="box-body">isi</div>
                <div class="box-footer">Info</div>
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">Judul</div>
                <div class="box-body">isi</div>
                <div class="box-footer">Info</div>
            </div>
            @foreach ($posts as $post)
         <!-- Default box -->
         @if( $post->kategori == 'Pengumuman')
            <div class="box box-danger">
         @else
            <div class="box box-info">
         @endif
            
            <div class="box-header with-border">
              <a href="{{ route('pages.post-detail', $post) }}"><h3><strong>{{ $post->judul }}</strong></h3></a>
              <div class="pull-right">{{ $post->updated_at->format('F d, Y - H:i') }}</div>
            </div>
          <div class="box-body text-justify">
            {!! str_limit($post->isi, 150, ' ...') !!}
          </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-sm bg-navy">{{ $post->kategori }}</button>
            </div>
           <!-- /.box-footer-->
         </div>
          <!-- /.box -->
        @endforeach
        {!! $posts->render() !!}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
@endsection
