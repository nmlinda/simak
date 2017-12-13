@extends('templates.dashboard')

@section('styles')
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <style>
    table, th, td {
        border: 2px solid #aaaaaa;
        {{--  border-collapse: collapse;  --}}
    }
    th, td {
        {{--  padding: 5px;  --}}
        {{--  text-align: left;      --}}
    }
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
                @if($sum_kegiatan==0)
                <h3>
                    -
                </h3>
                @else
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
                @endif
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
                @if($jumlah_mahasiswa != 0)
                    <h3>{{ $sum_kegiatan/$jumlah_mahasiswa }}</h3>
                @else
                    <h3>0</h3>    
                @endif

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
              @if($sum_kegiatan==0)
                <h3><sup>-</sup></h3>
              @else
                <h3>{{ round($sum_kehadiran/$sum_kegiatan*100, 2) }}<sup style="font-size: 20px">%</sup></h3>
              @endif
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

      @elseif($cek==false)
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              @if($sum_kegiatan==0)
                <h3>
                    -
                </h3>
                @else
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
                @endif

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
                @if($jumlah_mahasiswa != 0)
                    <h3>{{ $sum_kegiatan/$jumlah_mahasiswa }}</h3>
                @else
                    <h3>0</h3>    
                @endif
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
              @if($sum_kegiatan==0)
                <h3><sup>-</sup></h3>
              @else
                <h3>{{ round($sum_kehadiran/$sum_kegiatan*100, 2) }}<sup style="font-size: 20px">%</sup></h3>
              @endif

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
    @if($role!='Mahasiswa')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kelola User</h3>

                        <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>Gedung</th>
                                <th>Lorong</th>
                                <th>Kamar</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                            </thead>
                            <p hidden {{$no=1}}></p>
                            <tbody>
                            @foreach($childs as $child)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$child->name}}</td>
                                <td>{{$child->nim}}</td>
                                <td>{{$child->email}}</td>
                                <td>{{$child->gedung}}</td>
                                <td>{{$child->lorong}}</td>
                                <td>{{$child->kamar}}</td>
                                <td>{{$child->role}}</td>
                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{$child->id}}" value="{{$child->id}}">Edit</button></a></td>
                                <div class="modal fade" id="modal-edit{{$child->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Data {{$child->name}}</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" role="form" action="{{route('edit_user')}}">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH')}}
                                                <input type="hidden" name="id" value="{{$child->id}}">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" placeholder="{{$child->name}}" value="{{$child->name}}" name="name">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>NIM</label>
                                                    <input type="text" class="form-control" placeholder="{{$child->nim}}" value="{{$child->nim}}" name="nim">
                                                    @if ($errors->has('nim'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('nim') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="{{$child->email}}" value="{{$child->email}}" name="email">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Gedung</label>
                                                    <input type="text" class="form-control" placeholder="{{$child->gedung}}" value="{{$child->gedung}}" name="gedung">
                                                    @if ($errors->has('gedung'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('gedung') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Lorong</label>
                                                    <input type="text" class="form-control" placeholder="{{$child->lorong}}" value="{{$child->lorong}}" name="lorong">
                                                    @if ($errors->has('lorong'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('lorong') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Kamar</label>
                                                    <input type="text" class="form-control" placeholder="{{$child->kamar}}" value="{{$child->kamar}}" name="kamar">
                                                    @if ($errors->has('kamar'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('kamar') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" placeholder="" value="" name="password">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <td><a href="#"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{$child->id}}" value="{{$child->id}}">Hapus</button></a></td>
                                <div class="modal modal-danger fade" id="modal-delete{{$child->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Konfirmasi Hapus</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Apakah anda yakin ingin menghapus {{$child->name}}?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('user.destroy')}}" role="form" method="POST" >
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <input type="hidden" name="id" value="{{$child->id}}">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-outline pull-right">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@section('scripts')
    {{--  highchart  --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    @if($role == 'Mahasiswa'  && $cek == true)
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
    @elseif($cek==true && isset($dt_sodungs))
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
                        @if(isset($dt_sodungs))
                            @foreach($dt_sodungs as $key => $dt_sodung)
                                ' {{$key}} ',
                            @endforeach
                        @endif
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
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(function () {
        $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
@endsection