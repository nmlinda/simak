@extends('templates.dashboard')
@section('content')
    <section class="content-header">
      <h1>
        Administrator
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-user-plus"></i> Tambah user</li>
        <li class="active">Administrator</li>
      </ol>
    </section>
    <section class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Tambahkan Administrator Baru</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('tambahuser.administrator') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nim" class="col-md-4 control-label">NIM</label>

                                <div class="col-md-6">
                                    <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}" required autofocus>

                                    @if ($errors->has('nim'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nim') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Alamat Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gedung" class="col-md-4 control-label">Gedung</label>

                                <div class="col-md-2">
                                  <select class="form-control" name="gedung" required>
                                    <option hidden>-</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="A5">A5</option>
                                    <option value="A6">A6</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="C5">C5</option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lorong" class="col-md-4 control-label">Lorong</label>

                                <div class="col-md-2">
                                  <select class="form-control" name="lorong" required>
                                    <option hidden>-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kamar" class="col-md-4 control-label">Kamar</label>

                                <div class="col-md-2">
                                    <input id="kamar" type="text" class="form-control" name="kamar" value="{{ old('gedung') }}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <input type="hidden" name="supervisor" value="{{ $supervisor }}">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Tambahkan
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
