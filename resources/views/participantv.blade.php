@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Peserta Seleksi</h3>
            </div>
            <div class="title_right">
                <div class="col-md-3 col-sm-4 col-xs-1 pull-right">
                    <a href="/participants/create" class="btn btn-primary" type="button">Peserta Baru</a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Peserta Terverifikasi</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            
                        </p>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. KK</th>
                                    <th>Nama KRT</th>
                                    <th>Pendapatan</th>
                                    <th>Tabungan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$participant -> no_kk}}</td>
                                        <td>{{$participant -> nama_krt}}</td>
                                        <td>{{$participant -> pendapatan}}</td>
                                        <td>{{$participant -> tabungan}}</td>
                                        <td>
                                            <a href="/participants/{{ $participant -> id }}" class="badge badge-success">lihat</a>
                                            <a href="/participantedit/{{ $participant -> id}}" class="badge badge-success">edit</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
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