@extends('templates.dashboard')

@section('content')
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
            </div>
        </div>
    </div>
@endsection