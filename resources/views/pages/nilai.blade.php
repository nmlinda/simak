@extends('templates.dashboard')

@section('content')
    <section class="content-header">
      <h1>
        Nilai
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Nilai</li>
      </ol>
    </section>
    <section class="content">

          <div class="col-md-12">
              <div class="box box-info">
                  <div class="box-header">
                      <h4>Penilaian dari kehadiran setiap kegiatan asrama</h4>
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
                  </div>
                  <div class="table-responsive">

                      <table class="table table-hover">
                          <thead class="text-primary">
                              <th>Bulan</th>
                              <th>Jumlah Hadir</th>
                              <th>Jumlah Kegiatan</th>
                              <th>Nilai</th>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Januari</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>Februari</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>Maret</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>April</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>Mei</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>Juni</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>Juli</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr>
                                  <td>Agustus</td>
                                  <td>5</td>
                                  <td>7</td>
                                  <td class="text-primary">73</td>
                              </tr>
                              <tr class="callout callout-info">
                                  <td colspan="3">Rata-Rata</td>
                                  <td>73</td>
                              </tr>


                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
    </section>

@endsection
