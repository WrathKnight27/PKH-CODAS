<div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profil <small>Keluarga</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                    <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong>Profil Keluarga</strong>
                        <address>
                            <br><strong>Nama Kepala Keluarga     :</strong> {{$participant->nama_krt}}
                            <br><strong>Nomor Kartu Keluarga     :</strong> {{$participant->no_kk}}
                            <br><strong>Nomor Telepon            :</strong> {{$participant->no_telp}}
                            <br><strong>Alamat Email             :</strong> {{$participant->email}}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong>Alamat Tempat Tinggal</strong>
                        <address>
                            <br><strong>Jalan</strong> {{$participant->alamat_jalan}}
                            <br><strong>Gang</strong> {{$participant->alamat_gang}}, <strong>No.</strong> {{$participant->alamat_no_rumah}}
                            <br><strong>Kecamatan</strong> {{$participant->alamat_kecamatan}}
                            <br><strong>Kota</strong> {{$participant->alamat_kota}}
                            <br><strong>Provinsi</strong> {{$participant->alamat_provinsi}}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                    <strong>Status</strong>
                        <address>
                            <br><strong>Verifikasi Data :</strong> {{$participant->status_verifikasi}}
                            <br><strong>Seleksi T1 :</strong> {{$participant->status_codas}}
                            <br><strong>Seleksi T2 :</strong> {{$participant->status_pkh}}
                            <br><strong>Ranking :</strong> {{$participant->rank}}
                            <br><strong>Nilai Bantuan :</strong> {{$participant->nilai_bantuan}}
                        </address>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                </div>
            </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Kriteria <small>Kemiskinan</small></h2>
                            <ul class="nav navbar-right panel_toolbox">

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Kriteria kemiskinan adalah kriteria yang digunakan untuk meranking dan menyeleksi 10% peserta dengan tingkat kesejahteraan paling rendah
                            </p>
                            <table  class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope = "col">No.</th>
                                        <th scope = "col">Nama Kriteria</th>
                                        <th scope = "col">Nilai Kriteria</th>
                                        <th scope = "col">Subkriteria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php
                                        $id = 1234567;
                                        $nama = 'Kriteria X';
                                        $weight = 20;
                                        $weightnormal = 20;
                                    ?> -->
                                        <tr>
                                            <td>1</td>
                                            <td>Pendapatan</td>
                                            @if ($participant->pendapatan = 0)
                                                <td>Rp 0 - 500.000</td>
                                            @elseif ($participant->pendapatan = 1)
                                                <td>Rp 500.001 - 2.000.000</td>
                                            @elseif ($participant->pendapatan = 2)
                                                <td>Rp 2.000.001 - 5.000.000</td>
                                            @elseif ($participant->pendapatan = 3)
                                                <td>Di atas Rp 5.000.001</td>
                                            @endif
                                            <td>{{ $participant -> pendapatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tabungan</td>
                                            <td>n</td>
                                            <td>{{ $participant -> tabungan }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Luas Bangunan</td>
                                            <td>n</td>
                                            <td>{{ $participant -> luas_bangunan }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Luas Tanah</td>
                                            <td>n</td>
                                            <td>{{ $participant -> luas_tanah }}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jenis Lantai</td>
                                            <td>n</td>
                                            <td>{{ $participant -> jenis_lantai }}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Fasilitas BAB</td>
                                            <td>n</td>
                                            <td>{{ $participant -> fasilitas_bab }}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Jenis Dinding</td>
                                            <td>n</td>
                                            <td>{{ $participant -> jenis_dinding }}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Biaya Pengobatan</td>
                                            <td>n</td>
                                            <td>{{ $participant -> biaya_pengobatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Penggunaan Listrik</td>
                                            <td>n</td>
                                            <td>{{ $participant -> pemakaian_listrik }}</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Sumber Air Bersih</td>
                                            <td>n</td>
                                            <td>{{ $participant -> sumber_air_bersih }}</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Bahan Bakar Memasak</td>
                                            <td>n</td>
                                            <td>{{ $participant -> bahan_bakar_masak }}</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Konsumsi Daging Susu Ayam</td>
                                            <td>n</td>
                                            <td>{{ $participant -> konsumsi_dsa }}</td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Membeli Pakaian</td>
                                            <td>n</td>
                                            <td>{{ $participant -> membeli_pakaian }}</td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Makan Perhari</td>
                                            <td>n</td>
                                            <td>{{ $participant -> makan_perhari }}</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Pendidikan Kepala Rumah Tangga</td>
                                            <td>n</td>
                                            <td>{{ $participant -> pendidikan_krt }}</td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>Kendaraan Pribadi</td>
                                            <td>n</td>
                                            <td>{{ $participant -> kendaraan_pribadi }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Kriteria <small>PKH</small></h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                    Kriteria PKH adalah kriteria yang digunakan untuk menyeleksi ulang peserta yang memenuhi persyaratan penerima manfaat pkh
                                </p>
                                <table  class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope = "col">No.</th>
                                            <th scope = "col">Nama Kriteria</th>
                                            <th scope = "col">Nilai Kriteria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php
                                            $id = 1234567;
                                            $nama = 'Kriteria X';
                                            $weight = 20;
                                            $weightnormal = 20;
                                        ?> -->
                                            <tr>
                                                <td>1</td>
                                                <td>Ibu Hamil</td>
                                                <td>{{ $participant -> ibu_hamil }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Anak Usia Dini</td>
                                                <td>{{ $participant -> usia_dini }}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Anak SD</td>
                                                <td>{{ $participant -> anak_sd }}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Anak SMP</td>
                                                <td>{{ $participant -> anak_smp }}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Anak SMA</td>
                                                <td>{{ $participant -> anak_sma }}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Disabilitas Berat</td>
                                                <td>{{ $participant -> disabilitas_berat }}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Lanjut Usia</td>
                                                <td>{{ $participant -> lanjut_usia }}</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>