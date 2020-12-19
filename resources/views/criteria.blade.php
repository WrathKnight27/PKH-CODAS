@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kriteria</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Kriteria <small>Kemiskinan</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Kriteria kemiskinan adalah kriteria yang digunakan untuk meranking dan menyeleksi 10% peserta dengan tingkat kesejahteraan paling rendah
                        </p>
                        <table  class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope = "col">No.</th>
                                    <th scope = "col">Nama Kriteria</th>
                                    <th scope = "col">Bobot</th>
                                    <th scope = "col">Aktif</th>
                                    <th scope = "col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                    $id = 1234567;
                                    $nama = 'Kriteria X';
                                    $weight = 20;
                                    $weightnormal = 20;
                                ?> -->
                                <?php $no = 1; ?>
                                @foreach ($codascriterias as $codascriteria)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $codascriteria -> name }}</td>
                                        <td>{{ $codascriteria -> weight }}</td>
                                        <td>{{ $codascriteria -> active }}</td>
                                        <td>
                                            <a href="/criteria/codas/{{ $codascriteria -> id}}" class="badge badge-success">edit</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Kriteria <small>Program Keluarga Harapan</small></h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Kriteria PKH adalah kriteria yang digunakan untuk menyaring kembali peserta yang memenuhi minimal satu syarat yang ditetapkan dalam PKH
                        </p>
                        <table  class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope = "col">No.</th>
                                    <th scope = "col">Nama Kriteria</th>
                                    <th scope = "col">Nilai Bantuan</th>
                                    <th scope = "col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                    $idpkh = 1234567;
                                    $namapkh = 'Kriteria X';
                                    $npkh = 500000;
                                ?> -->
                                <?php $no = 1; ?>
                                @foreach ($pkhcriterias as $pkhcriteria)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pkhcriteria -> name }}</td>
                                        <td>{{ $pkhcriteria -> bantuan }}</td>
                                        <td>
                                            <a href="/criteria/pkh/{{ $pkhcriteria -> id}}" class="badge badge-success">edit</a>
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