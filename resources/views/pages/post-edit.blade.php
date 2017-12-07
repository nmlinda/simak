@extends('templates.dashboard')

@section('content')
    <section class="content-header">
      <h1>
        Post
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('pages.post-saya') }}">Post saya</a></li>
        <li class="active">Edit Post</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Edit Post</h3>
          <!-- tools box -->
          <!-- <div class="pull-right box-tools">

              <i class="fa fa-times"></i></button>
          </div> -->
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->

        <div class="box-body pad">
          <form class="" action="{{ route('pages.post-update', $post) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH')}}
            <div class="form-group">
                <input class="form-control input-lg" type="text" name="judul" placeholder="Judul" value="{{ $post->judul }}" required>
            </div>
            <div class="form-group">
                <textarea class="form-control textarea" placeholder="Tulis post disini.."  name="isi" value="{{ $post->isi }}" required
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="kategori" placeholder="Kategori" value="{{ $post->kategori }}" required>
            </div>
            <div class="form-group"> 
                <button type="submit" class="btn btn-primary pull-right" >Kirim</button>
            </div>
          </form>
        </div>
      </div>

    </section>
@endsection