@extends('templates.dashboard')

@section('content')
    <section class="content-header">
      <h1>
        Edit Password
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fa fa-user-key"></i>Password</li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <section class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Ganti Password</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('update_password') }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH')}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="old_password" class="col-md-4 control-label">Password Lama</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control" name="old_password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_old') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password Baru</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="new_password" required>

                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password Baru</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ganti Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
@endsection