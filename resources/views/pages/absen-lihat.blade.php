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
<section class="content-header">
      <h1>
        Lihat
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Absen</li>
        <li class="active">Lihat</li>
      </ol>
    </section>

    {{--  Untuk Mahasiswa  --}}
    {{--  <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Absen</h4>
                            <p class="category">Jumlah Kehadiran Mahasiswa pada setiap kegiatan asrama.</p>
                        </div>
                        <div class="card-content table-responsive">
                        <div class="col-md-3 form-group">
                            <label for="sel1">Pilih Kegiatan:</label>
                            <select class="form-control" id="sel1">
                                <option>Sodung</option>
                                <option>Solong</option>
                                <option>Ngadung</option>
                                <option>Ngalong</option>
                                <option>HBA</option>
                            </select>
                        </div>
                            <table class="table table-hover">
                                <thead>
                                    <th>Bulan</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Kehadiran</th>
                                    <th>Jumlah Kehadiran</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="3">Januari</td>
                                        <td>Sabtu, 17 Januari 2018</td>
                                        <td>Hadir</td>
                                        <td rowspan="3">2</td>
                                    </tr>
                                    <tr>
                                        <td>Senin, 20 Januari 2018</td>
                                        <td>Alfa</td>
                                    </tr>
                                    <tr>
                                        <td>Kamis, 30 Januari 2018</td>
                                        <td>Hadir</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">Februari</td>
                                        <td>Jum'at, 4 Februari 2018</td>
                                        <td>Hadir</td>
                                        <td rowspan="3">1</td>
                                    </tr>
                                    <tr>
                                        <td>Rabu, 14 Februari 2018</td>
                                        <td>Sakit</td>
                                    </tr>
                                    <tr>
                                        <td>Selasa, 25 Februari 2018</td>
                                        <td>Sakit</td>
                                    </tr>
                                    <tr data-background-color="green">
                                    <td colspan="3">Total Kehadiran</td>
                                    <td>5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
    {{--  Untuk selain mahasiswa  --}}
    <section>
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">Masukan Absensi Kegiatan</h3>
                            <a href="{{ route('pages.absen/edit') }}"><button class="pull-right btn btn-primary">Edit</button></a>
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
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_sodung}} ">Sodung ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_sodung; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($sodungs as $sodung)
                                                                    
                                                                    @if($user->id == $sodung->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($sodungs as $sodung)  --}}
                                                                        @if ($sodung->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                                
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Solong</h4> 
                                                <p>Masukan presensi kegiatan solong.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_solong }} ">Solong ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_solong; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($solongs as $solong)
                                                                    
                                                                    @if($user->id == $solong->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($sodungs as $sodung)  --}}
                                                                        @if ($solong->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Ngadung</h4> 
                                                <p>Masukan presensi kegiatan ngadung.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_ngadung}} ">Ngadung ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_ngadung; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($ngadungs as $ngadung)
                                                                    
                                                                    @if($user->id == $ngadung->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($sodungs as $sodung)  --}}
                                                                        @if ($ngadung->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Apel</h4> 
                                                <p>Masukan presensi kegiatan apel.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_ngalong}} ">Ngalong ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_ngalong; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($ngalongs as $ngalong)
                                                                    
                                                                    @if($user->id == $ngalong->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($ngalongs as $ngalong)  --}}
                                                                        @if ($ngalong->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_5">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Ngalong</h4> 
                                                <p>Masukan presensi kegiatan ngalong.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_apel}} ">Apel ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_apel; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($apels as $apel)
                                                                    
                                                                    @if($user->id == $apel->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($apels as $apel)  --}}
                                                                        @if ($apel->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_6">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">HBA</h4> 
                                                <p>Masukan presensi kegiatan HBA.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_hariBersihAsrama}} ">HBA ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_hariBersihAsrama; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($hariBersihAsramas as $hariBersihAsrama)
                                                                    
                                                                    @if($user->id == $hariBersihAsrama->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($hariBersihAsramas as $hariBersihAsrama)  --}}
                                                                        @if ($hariBersihAsrama->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_7">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Acara Lain</h4> 
                                                <p>Masukan presensi kegiatan Acara Lain.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label for="lorong">Pilih Lorong :</label>
                                                                <select class="form-control" id="lorong">
                                                                    <option>Semua</option>
                                                                    <option>2</option>
                                                                    <option>4</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table class="table table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIM</th>
                                                                <th>Kamar</th>
                                                                <th colspan="{{ $sum_sodung}} ">Sodung ke</th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                @for ($i = $sum_sodung; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
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
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($sodungs as $sodung)
                                                                    
                                                                    @if($user->id == $sodung->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($sodungs as $sodung)  --}}
                                                                        @if ($sodung->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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