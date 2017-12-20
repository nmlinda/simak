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
      <!-- search bar -->
      <form action="{{ route('pages.post-semua-hasil') }}" method="GET">
        <div class="form-group input-group input-group-lg">
          <input type="text" class="form-control" placeholder="Pencarian post.." name="cari">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-fw fa-search"></i></button>
          </span>
        </div>
      </form>

      @if($posts->isEmpty())
        <div class="callout callout-info">
           <h4>Belum ada post tersedia.</h4>

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
              <div class="pull-right">{{ $post->updated_at->format('F d, Y - H:i') }}</div>
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{ asset('assets/dist/img/profile-photo.jpg') }}" alt="User Image">
                <span class="name">
                  {{ $post->user['name'] }}<br>
                  
                </span>
                <span class="role">{{ $post->user['role'] }}</span>
              </div>
             
            </div>
            <div class="box-body">
              <img src="{{ asset('storage/'.$post->foto) }}" alt="" class="img-responsive" style="display: block;margin-left: auto; margin-right: auto"><br>
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