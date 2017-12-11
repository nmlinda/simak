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
              <div class="chart" id="highchart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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
                ]
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
    @endif
@endsection