@extends('templates.dashboard')

@section('styles')
  <!--  jQuery -->
  {{--  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>  --}}

  <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

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
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header" data-background-color="blue">
                              <h4 class="title">Input Absensi</h4>
                              <p class="category">2017/2018</p>
                          </div>
                          <div class="card-content table-responsive">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="sel1">Pilih Kegiatan :</label>
                                <select class="form-control" id="sel1">
                                  <option>Sodung</option>
                                  <option>Solong</option>
                                  <option>Ngadung</option>
                                  <option>Ngalong</option>
                                  <option>HBA</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <label for="lorong">Pilih Lorong :</label>
                                <select class="form-control" id="lorong">
                                  <option>Semua</option>
                                  <option>2</option>
                                  <option>4</option>
                                  <option>10</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <!-- Date -->
                                <div class="form-group">
                                    <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="date">Date</label>
                                        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                          </div>

                            <form>
                              <table class="table table-hover">
                                  <thead>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>NIM</th>
                                      <th>Kehadiran</th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Adam Firdaus</td>
                                      <td>G64150014</td>
                                      <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="">
                                          </label>
                                        </div>
                                      </td>
                                    </tr>

                                  </tbody>

                              </table>
                              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </form>
                          </div>
                      </div>
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
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    </script>
@endsection