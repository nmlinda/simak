@extends('templates.dashboard')

@section('styles')
  <!--  jQuery -->
  {{--  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>  --}}

  <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <style>
    table, th, td {
        border: 2px solid #aaaaaa;
        {{--  border-collapse: collapse;  --}}
    }
    th, td {
        {{--  padding: 5px;  --}}
        {{--  text-align: left;      --}}
    }
    </style>
  <!-- Bootstrap Date-Picker Plugin -->
  {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>  --}}
@endsection

@section('content')
    {{--  slug  --}}
    <section class="content-header">
      <h1>
        Absen
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Absen</li>
      </ol>
    </section>
    {{--  content  --}}
    <section>
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">Masukan Absensi Kegiatan</h3>
                            <div><br></div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Sodung</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Solong</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Ngadung</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Ngalong</a></li>
                                    <li><a href="#tab_5" data-toggle="tab">Apel</a></li>
                                    <li><a href="#tab_6" data-toggle="tab">HBA</a></li>
                                    <li><a href="#tab_7" data-toggle="tab">Acara Lain</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Sodung</h4> 
                                                <p>Masukan presensi kegiatan sodung.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                <table>
                                                    <tr>
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    </tr>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">
                                                     {{ csrf_field() }}
                                                     <tr>
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                    </tr>
                                                </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                            <input type="hidden" name="model" value="Sodung">
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <p hidden>{{ $nomor = 0}}</p>
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Solong</h4>
                                                <p>Masukan presensi kegiatan solong.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                <table>
                                                    <tr>
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    </tr>
                                                    <tr>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">
                                                     {{ csrf_field() }}
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                    </tr>
                                                </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                            <input type="hidden" name="model" value="Solong">
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <p hidden>{{ $nomor = 0}}</p>
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Ngadung</h4>
                                                <p>Masukan presensi kegiatan ngadung.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                <table>
                                                    <tr>
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    </tr>
                                                    <tr>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">{{--{{ route('tambah_ngadung') }}">--}}
                                                     {{ csrf_field() }}
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                    </tr>
                                                </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                            <input type="hidden" name="model" value="Ngadung">
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_4">
                                        <p hidden>{{ $nomor = 0}}</p>
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Ngalong</h4>
                                                <p>Masukan presensi kegiatan ngalong.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                <table>
                                                    <tr>
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    </tr>
                                                    <tr>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">
                                                     {{ csrf_field() }}
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                    </tr>
                                                </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                            <input type="hidden" name="model" value="Ngalong">
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_5">
                                        <p hidden>{{ $nomor = 0}}</p>
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Apel</h4>
                                                <p>Masukan presensi kegiatan apel.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                <table>
                                                    <tr>
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    </tr>
                                                    <tr>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">{{--{{ route('tambah_apel') }}">--}}
                                                     {{ csrf_field() }}
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                    </tr>
                                                </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                            <input type="hidden" name="model" value="Apel">
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_6">
                                        <p hidden>{{ $nomor = 0}}</p>
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Hari Bersih Asrama</h4>
                                                <p>Masukan presensi kegiatan hari bersih asrama.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                <table>
                                                    <tr>
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    </tr>
                                                    <tr>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">{{--{{ route('tambah_HBA') }}">--}}
                                                     {{ csrf_field() }}
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                    </tr>
                                                </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                            <input type="hidden" name="model" value="HBA">
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_7">
                                        <p hidden>{{ $nomor = 0}}</p>
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Acara Lain</h4>
                                                {{--  <p class="category">2017/2018</p>  --}}
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="lorong">Pilih Lorong :</label>
                                                        <select class="form-control" id="lorong">
                                                            <option>Semua</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                    <form class="form-horizontal" method="POST" action="{{ route('tambah_kegiatan') }}">
                                                     {{ csrf_field() }}
                                                    <div class="col-md-3">
                                                        <!-- Date -->
                                                        <div class="form-group">
                                                            <div class="form-group"> <!-- Date input -->
                                                                <label class="control-label" for="date">Date</label>
                                                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th colspan="2">Kehadiran</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Tidak Hadir</th>
                                                                <th>Hadir</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="0">
                                                                </td>
                                                                <td>
                                                                <input type="radio" class="form-check-input" name="kehadiran[{{$nomor-1}}]" value="1">
                                                                </td>
                                                                <input type="hidden" name="id_mahasiswa[{{$nomor-1}}]" value="{{ $user->id }}">
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                  
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection
@section('scripts')
    <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    </script>
@endsection