@extends('templates.dashboard')

@section('styles')
    <style>
    #highchart {
      min-width: 310px;
      max-width: 800px;
      height: 400px;
      margin: 0 auto
    }
    </style>
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Beranda
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      @if($role == 'Mahasiswa')
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              <p hidden {{$x = round($jumlah_kehadiran/$jumlah_kegiatan*100, 2)}}></p>
              @switch($x)
                  @case($x>= 80)
                      A
                      @break
                  @case($x>=75)
                      AB
                      @break
                  @case($x>=70)
                      B
                      @break
                  @case($x>=60)
                      BC
                      @break
                  @case($x>=50)
                      C
                      @break
                  @case($x>=40)
                      D
                      @break
                  @default
                      E
              @endswitch
              </h3>

              <p>Nilai Sementara</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$jumlah_kegiatan}}</h3>

              <p>Jumlah Kegiatan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$jumlah_kehadiran}}</h3>

              <p>Jumlah Kehadiran</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ round($jumlah_kehadiran/$jumlah_kegiatan*100, 2) }}<sup style="font-size: 20px">%</sup></h3>

              <p>Presentasi Kehadiran</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Partisipasi Kegiatan Asrama</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="highchart" style="height: 350px;">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
      @elseif($cek==true)
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><p hidden {{$x = round($sum_kehadiran/$sum_kegiatan*100, 2)}}></p>
              @switch($x)
                  @case($x>= 80)
                      A
                      @break
                  @case($x>=75)
                      AB
                      @break
                  @case($x>=70)
                      B
                      @break
                  @case($x>=60)
                      BC
                      @break
                  @case($x>=50)
                      C
                      @break
                  @case($x>=40)
                      D
                      @break
                  @default
                      E
              @endswitch</h3>

              <p>Nilai rata-rata</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $sum_kegiatan/$jumlah_mahasiswa }}</h3>

              <p>Jumlah Kegiatan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$jumlah_mahasiswa}}</h3>

              <p>Jumlah Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ round($sum_kehadiran/$sum_kegiatan*100, 2) }}<sup style="font-size: 20px">%</sup></h3>

              <p>Presentasi Kehadiran Total</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="box-body chart-responsive" style="min-width: 300px;">
              <div class="chart" id="sr-bar">
              </div>
        </div>
      </div>
      @endif
      <!-- /.row (main row) -->
    </section>
@endsection

@section('scripts')
    {{--  highchart  --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    @if($role == 'Mahasiswa')
      <script>
        Highcharts.chart('highchart', {

            title: {
                text: 'Persentase Keaktifan Kegiatan Asrama'
            },

            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                  @foreach($dt_sodungs as $key => $dt_sodung)
                      ' {{$key}} ',
                  @endforeach
                ],
                crosshair: true
            },
            yAxis: {
                title: {
                    text: 'Kehadiran (%)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },

            series: [{
                name: 'Kehadiran Sodung',
                data: [
                  @foreach($dt_sodungs_hadir as $key => $hadir)
                      {{round($hadir*100,2)}},
                  @endforeach
                ]
            }, {
                name: 'Kehadiran Solong',
                data: [
                  @foreach($dt_solongs_hadir as $key => $hadir)
                      {{round($hadir*100,2)}},
                  @endforeach
                ]
            },{
                name: 'Kehadiran Ngadung',
                data: [
                  @foreach($dt_ngadungs_hadir as $key => $hadir)
                      {{round($hadir*100,2)}},
                  @endforeach
                ]
            },{
                name: 'Kehadiran Ngalong',
                data: [
                  @foreach($dt_ngalongs_hadir as $key => $hadir)
                      {{round($hadir*100,2)}},
                  @endforeach
                ]
            },{
                name: 'Kehadiran Apel',
                data: [
                  @foreach($dt_apels_hadir as $key => $hadir)
                      {{round($hadir*100,2)}},
                  @endforeach
                ]
            },{
                name: 'Kehadiran HBA',
                data: [
                  @foreach($dt_hariBersihAsramas_hadir as $key => $hadir)
                      {{round($hadir*100,2)}},
                  @endforeach
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        minWidth: 800,
                        minHeight:1200
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
      </script>
    @elseif($cek==true)
    <script>
        Highcharts.chart('sr-bar', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Persentase Kehadiran Mahasiswa'
            },
            subtitle: {
                text: 'Berdasarkan bulan per kegiatan.'
            },
            xAxis: {
                categories: [
                    @foreach($dt_sodungs as $key => $dt_sodung)
                      ' {{$key}} ',
                    @endforeach
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Kehadiran (%)'
                }
            },
            tooltip: {
                headerFormat:   '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat:    '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                footerFormat:   '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Sodung',
                data: [
                    @foreach($dt_sodungs_hadir as $key => $hadir)
                        @if($hadir != null)
                            {{ round($hadir*100,2) }},
                        @endif 
                    @endforeach
                ]
            },{
                name: 'Solong',
                data: [
                    @foreach($dt_solongs_hadir as $key => $hadir)
                      @if($hadir != null)
                            {{ round($hadir*100,2) }},
                        @endif 
                    @endforeach
                ]
            },{
                name: 'Ngadung',
                data: [
                    @foreach($dt_ngadungs_hadir as $key => $hadir)
                      @if($hadir != null)
                            {{ round($hadir*100,2) }},
                        @endif 
                    @endforeach
                ]
            },{
                name: 'Ngalong',
                data: [
                    @foreach($dt_ngalongs_hadir as $key => $hadir)
                      @if($hadir != null)
                            {{ round($hadir*100,2) }},
                        @endif 
                    @endforeach
                ]
            },{
                name: 'Apel',
                data: [
                    @foreach($dt_apels_hadir as $key => $hadir)
                      @if($hadir != null)
                            {{ round($hadir*100,2) }},
                        @endif 
                    @endforeach
                ]
            },{
                name: 'HBA',
                data: [
                    @foreach($dt_hariBersihAsramas_hadir as $key => $hadir)
                      @if($hadir != null)
                            {{ round($hadir*100,2) }},
                        @endif 
                    @endforeach
                ]
            }],
            responsive: {
                rules: [{
                    condition: {
                        minWidth: 800,
                        minHeight:1200
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
    @endif
@endsection