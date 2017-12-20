@extends('templates.homepage')

@section('style')
    <style>
        .col-center-block {
        float: none;
        display: block;
        margin: 0 auto;
        margin-left: auto; margin-right: auto;
        }
    </style>
    
@endsection

@section('content')
    <section class="content">
        {{--  <div class="boxx box-info" style="margin-right: 200px; margin-left: 200px;">  --}}
            {{--  <div class="box-header with-border">
                <h3 class="box-title text-center">Seputar Asrama</h3>
            </div>  --}}
            {{--  <div class="box-body" style="padding-right: 20px; padding-left: 20px;">  --}}
    <div class="content-wrapper">
        <div class="container">
            <div class="row" style="margin-top: 20px;">
            @foreach($posts as $post)
            
                <div class="col-md-3">
                    <div class="box box-default" >
                        <div class="box-body" style="height: 250px;">
                            <a href="{{ route('pages.post-detail', $post) }}"><h4><strong>{{ $post->judul }}</strong></h4></a>
                            <p>
                                <i class="fa fa-calendar"></i> {{ $post->updated_at->format('F d, Y') }}
                                <i class="fa fa-clock-o"></i> {{ $post->updated_at->format('H:i') }}
                            </p>
                            <div class="text-justify text-muted">
                                {!! mb_strimwidth($post->isi, 0, 250, ' ...') !!}
                            </div>   
                            
                        </div>
                    </div>
                </div>
            
            {{--  <div class="row">
                    <div class="col-md-4 col-center-block">
                        <div class="col-center-block">
                            <div class="box-header with-border">
                                <a href="{{ route('pages.post-detail', $post) }}"><h3><strong>{{ $post->judul }}</strong></h3></a>
                                <span class="pull-right">{{ $post->updated_at->format('F d, Y - H:i') }}</span>
                            </div>
                            <div class="box-body text-justify">
                                {!! str_limit($post->isi, 200, ' ...') !!}
                            </div>
                        </div>
                    </div>
            </div>  --}}
            @endforeach
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <div class="pull-right">
                        {!! $posts->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{--  <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6">
            <!-- Default box -->
            @if( $post->kategori == 'Pengumuman')
             <div class="box box-danger">
            @else
             <div class="box box-info">
            @endif
            
                <div class="box-header with-border">
                <a href="{{ route('pages.post-detail', $post) }}"><h3><strong>{{ $post->judul }}</strong></h3></a>
                <span class="pull-right">{{ $post->updated_at->format('F d, Y - H:i') }}</span>
                </div>

                <div class="box-body text-justify">
                    {!! str_limit($post->isi, 200, ' ...') !!}
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <button type="button" class="btn btn-sm bg-navy">{{ $post->kategori }}</button>
                </div>
           <!-- /.box-footer-->
            </div>
          <!-- /.box -->
        </div>
        @endforeach
        {!! $posts->render() !!}
    </div>
        <!-- /.box-body -->
        </div>  --}}
        <!-- /.box -->
    </section>
@endsection
