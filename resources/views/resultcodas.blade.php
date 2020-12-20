@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Hasil Seleksi Kemiskinan</h3>
            </div>
        </div>
        <div class="title_right">
            <div class="col-md-3 col-sm-4 col-xs-1 pull-right">
                <a href="/codasresult/refresh" class="btn btn-primary" type="button">Perbarui Hasil</a>
                <a href="/codasresultprint" class="btn btn-primary" type="button">Cetak Laporan</a>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tabel Peserta</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Ini adalah data hasil seleksi menggunakan kriteria kemiskinan dan metode CODAS
                        </p>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>No. KK</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>Nilai</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td>{{$participant -> rank}}</td>
                                        <td>{{$participant -> no_kk}}</td>
                                        <td>{{$participant -> nama_krt}}</td>
                                        <td>{{$participant -> Hi}}</td>
                                        <td>
                                            <a href="/codasresult/{{ $participant -> id }}" class="badge badge-success">lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection