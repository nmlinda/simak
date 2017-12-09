@extends('templates.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Semua Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Post saya</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
      @if($postSaya)
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
                <a href="{{ route('pages.post-edit', $post) }}" type="button" class="btn btn-sm btn-primary">
                  <i class="fa fa-pencil-square-o"></i> Edit</a>
                <a href="" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus{{ $post }}">
                  <i class="fa fa-trash-o"></i> Hapus</a>   
                     
              <div class="modal fade" id="#hapus{{ $post }}" style="display: none;">
               <div class="modal-dialog">
                 <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Apakah anda yakin ingin menghapus post ini?</h4>
                  </div>
                  <div class="modal-body">
                    {{ $post->judul }}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <form action="{{ route('pages.post-hapus', $post) }}" class="" method="post">
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                      <button type="button" class="btn btn-primary">Ya</button>
                    </form>
                  </div>
                </div>
            <!-- /.modal-content -->
              </div>
          <!-- /.modal-dialog -->
        </div>
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
      @else
        <div class="callout callout-info">
           <h4>Anda belum membuat post.</h4>
           <p>Buat <a href="{{ route('pages.post-buat') }}">post</a> sekarang.</p>
        </div>
      @endif

    </section>
    <!-- /.content -->
  
@endsection