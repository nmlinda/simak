@extends('templates.dashboard')

@section('content')
    {{--  slug  --}}
    <section class="content-header">
      <h1>
        Timeline
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>
    {{--  content  --}}
    <section class="content">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            <tr>
                              <td colspan="2" class="callout callout-info">Januari</td>
                            </tr>
                            <tr>
                              <td>Apel Pagi</td>
                              <td>14 Januari 2018</td>
                            </tr>
                            <tr>
                              <td>Apel Pagi</td>
                              <td>14 Januari 2018</td>
                            </tr>
                            <tr>
                              <td>Apel Pagi</td>
                              <td>14 Januari 2018</td>
                            </tr>
                            <tr>
                              <td colspan="2" class="callout callout-info">Februari</td>
                            </tr>
                            <tr>
                              <td>Apel Pagi</td>
                              <td>14 Januari 2018</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
