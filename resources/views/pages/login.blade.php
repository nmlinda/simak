@guest
<!DOCTYPE html>
<html>
@include('templates.partials._head')
@include('templates.partials._alert')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Simak</b>Asrama</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk ke halaman <b>Dashboard</b> anda.</p>

    <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}

      <div class="form-group has-feedback">
        <input id="nim" type="nim" placeholder="NIM" class="form-control" name="nim" value="" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        {{--  @if ($errors->has('nim'))
            <span class="help-block">
                <strong>{{ $errors->first('nim') }}</strong>
            </span>
        @endif  --}}
      </div>
      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ route('password.request') }}">Lupa kata sandi</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('templates.partials._scripts')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
@endguest
