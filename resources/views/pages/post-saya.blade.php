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
      <!-- search bar -->
      <form action="{{ route('pages.post-saya-hasil') }}" method="GET">
        <div class="form-group input-group input-group-lg">
          <input type="text" class="form-control" placeholder="Pencarian post.." name="cari">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-fw fa-search"></i></button>
          </span>
        </div>
      </form>
      
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
              <a href="{{ route('pages.post-detail', $post) }}"><h3><strong>{{ $post->judul }}</strong></h3></a>
              <span>
                  {{ $post->updated_at->diffForHumans() }}
                  <!-- @php
                    echo date('h:m d F Y', strtotime($post->update_at));
                  @endphp -->
              </span>
           
              <div class="box-tools pull-right btn-group">
                <a href="{{ route('pages.post-edit', $post) }}" class="btn btn-sm btn-flat btn-primary margin">
                  <i class="fa fa-pencil-square-o"></i> Edit
                </a>
                <button type="button" class="btn btn-sm btn-flat btn-danger margin" data-toggle="modal" 
                  data-target="#hapus{{$post->id}}" value="{{$post->id}}">
                  <i class="fa fa-trash-o"></i> Hapus
                </button>
              </div>
            </div>

              <!-- modal hapus -->
              <div class="modal fade" id="hapus{{$post->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Menghapus post</h4>
                    </div>
                    <div class="modal-body">
                      Apakah anda yakin ingin menghapus post ini?<br>
                      <blockquote>
                        <h4><strong>{{ $post->judul }}</strong></h4>
                        {!! str_limit($post->isi, 150, ' ...') !!}
                      </blockquote>
                    </div>
                    <div class="modal-footer">
                      <form method="POST" action="{{ route('pages.post-hapus', $post) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                      </form>
                    </div>                            
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

            <div class="box-body">
            {!! mb_strimwidth($post->isi, 0, 255, "...") !!}
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
      @endif

    </section>
    <!-- /.content -->
  
@endsection