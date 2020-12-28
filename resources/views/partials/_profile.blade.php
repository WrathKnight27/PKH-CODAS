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
                            <br><strong>Verifikasi Data :</strong> 
                            @if ($participant->status_verifikasi == 1)
                            Sudah Terverifikasi
                            @else 
                            Belum Terverifikasi
                            @endif
                            <br><strong>Seleksi Tahap 1 :</strong> 
                            @if ($participant->status_codas == 1)
                            Lolos
                            @else 
                            Tidak Lolos
                            @endif
                            <br><strong>Seleksi Tahap 2 :</strong> 
                            @if ($participant->status_pkh == 1)
                            Lolos
                            @else 
                            Tidak Lolos
                            @endif
                            <br><strong>Ranking :</strong> {{$participant->rank}}
                            <br><strong>Nilai Bantuan :</strong> 
                            @if ($participant->nilai_bantuan > 550000)
                            Rp {{$participant->nilai_bantuan}}
                            @else 
                            -
                            @endif
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
                                        <tr>
                                            <td>1</td>
                                            <td>Pendapatan</td>
                                            @if ($participant->pendapatan == 1)
                                                <td>Rp 0 - 500.000</td>
                                            @elseif ($participant->pendapatan == 2)
                                                <td>Rp 500.100 - 1.000.000</td>
                                            @elseif ($participant->pendapatan == 3)
                                                <td>Rp 1.000.100 - 2.000.000</td>
                                            @elseif ($participant->pendapatan == 4)
                                                <td>Rp 2.000.100 - 3.000.000</td>
                                            @elseif ($participant->pendapatan == 5)
                                                <td>Rp 3.000.100 - 5.000.000</td>
                                            @elseif ($participant->pendapatan == 6)
                                                <td>Rp 5.000.100 - 7.000.000</td>
                                            @elseif ($participant->pendapatan == 7)
                                                <td>Di atas Rp 7.000.001</td>
                                            @endif
                                            <!-- <td>n</td> -->
                                            <!-- <td>{{ $participant -> pendapatan }}</td> -->
                                            <td>{{ $participant->pendapatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tabungan</td>
                                            @if ($participant->tabungan == 1)
                                                <td>Rp 0 - 1.000.000</td>
                                            @elseif ($participant->tabungan == 2)
                                                <td>Rp 1.000.100 - 2.000.000</td>
                                            @elseif ($participant->tabungan == 3)
                                                <td>Rp 2.000.100 - 4.000.000</td>
                                            @elseif ($participant->tabungan == 4)
                                                <td>Rp 4.000.100 - 6.000.000</td>
                                            @elseif ($participant->tabungan == 5)
                                                <td>Rp 6.000.100 - 8.000.000</td>
                                            @elseif ($participant->tabungan == 6)
                                                <td>Rp 8.000.100 - 10.000.000</td>
                                            @elseif ($participant->tabungan == 7)
                                                <td>Di atas Rp 10.000.001</td>
                                            @endif
                                            <td>{{ $participant -> tabungan }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Hutang</td>
                                            @if ($participant->hutang == 1)
                                                <td>Rp 0 - 1.000.000</td>
                                            @elseif ($participant->hutang == 2)
                                                <td>Rp 1.000.100 - 2.000.000</td>
                                            @elseif ($participant->hutang == 3)
                                                <td>Rp 2.000.100 - 4.000.000</td>
                                            @elseif ($participant->hutang == 4)
                                                <td>Rp 4.000.100 - 6.000.000</td>
                                            @elseif ($participant->hutang == 5)
                                                <td>Rp 6.000.100 - 8.000.000</td>
                                            @elseif ($participant->hutang == 6)
                                                <td>Rp 8.000.100 - 10.000.000</td>
                                            @elseif ($participant->hutang == 7)
                                                <td>Di atas Rp 10.000.001</td>
                                            @endif
                                            <td>{{ $participant -> hutang }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Luas Bangunan</td>
                                            @if ($participant->luas_bangunan == 1)
                                                <td>0 - 10 meter persegi</td>
                                            @elseif ($participant->luas_bangunan == 2)
                                                <td>11 - 20 meter persegi</td>
                                            @elseif ($participant->luas_bangunan == 3)
                                                <td>21 - 30 meter persegi</td>
                                            @elseif ($participant->luas_bangunan == 4)
                                                <td>31 - 40 meter persegi</td>
                                            @elseif ($participant->luas_bangunan == 5)
                                                <td>Di atas 40 meter persegi</td>
                                            @endif
                                            <td>{{ $participant -> luas_bangunan }}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Luas Tanah</td>
                                            @if ($participant->luas_tanah == 1)
                                                <td>0 - 20 meter persegi</td>
                                            @elseif ($participant->luas_tanah == 2)
                                                <td>21 - 40 meter persegi</td>
                                            @elseif ($participant->luas_tanah == 3)
                                                <td>41 - 60 meter persegi</td>
                                            @elseif ($participant->luas_tanah == 4)
                                                <td>61 - 80 meter persegi</td>
                                            @elseif ($participant->luas_tanah == 5)
                                                <td>Di atas 80 meter persegi</td>
                                            @endif
                                            <td>{{ $participant -> luas_tanah }}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Kelayakan Lantai Rumah</td>
                                            @if ($participant->kelayakan_lantai == 1)
                                                <td>Tidak Layak</td>
                                            @elseif ($participant->kelayakan_lantai == 2)
                                                <td>Layak</td>
                                            @endif
                                            <td>{{ $participant -> kelayakan_lantai }}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Kelayakan Dinding Rumah</td>
                                            @if ($participant->kelayakan_dinding == 1)
                                                <td>Tidak Layak</td>
                                            @elseif ($participant->kelayakan_dinding == 2)
                                                <td>Layak</td>
                                            @endif
                                            <td>{{ $participant -> kelayakan_dinding }}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Kelayakan Atap Rumah</td>
                                            @if ($participant->kelayakan_atap == 1)
                                                <td>Tidak Layak</td>
                                            @elseif ($participant->kelayakan_atap == 2)
                                                <td>Layak</td>
                                            @endif
                                            <td>{{ $participant -> kelayakan_atap }}</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Fasilitas BAB</td>
                                            @if ($participant->fasilitas_bab == 1)
                                                <td>Tidak Layak</td>
                                            @elseif ($participant->fasilitas_bab == 2)
                                                <td>Layak</td>
                                            @endif
                                            <td>{{ $participant -> fasilitas_bab }}</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Biaya Pengobatan</td>
                                            @if ($participant->biaya_pengobatan == 1)
                                                <td>Rp 0 - 200.000</td>
                                            @elseif ($participant->biaya_pengobatan == 2)
                                                <td>Rp 200.100 - 500.000</td>
                                            @elseif ($participant->biaya_pengobatan == 3)
                                                <td>Di atas Rp 500.000</td>  
                                            @endif
                                            <td>{{ $participant -> biaya_pengobatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Kebutuhan Listrik</td>
                                            @if ($participant->pemakaian_listrik == 1)
                                                <td>Tidak Ada</td>
                                            @elseif ($participant->pemakaian_listrik == 2)
                                                <td>450 VA</td>
                                            @elseif ($participant->pemakaian_listrik == 3)
                                                <td>900 VA</td>
                                            @elseif ($participant->pemakaian_listrik == 4)
                                                <td>1300 VA</td>
                                            @elseif ($participant->pemakaian_listrik == 5)
                                                <td>2200 VA</td>
                                            @elseif ($participant->pemakaian_listrik == 6)
                                                <td>5500 VA</td>
                                            @elseif ($participant->pemakaian_listrik == 7)
                                                <td>14.000 VA</td>
                                            @elseif ($participant->pemakaian_listrik == 8)
                                                <td>200.000 VA</td>
                                            @endif
                                            <td>{{ $participant -> pemakaian_listrik }}</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Sumber Air Bersih</td>
                                            @if ($participant->sumber_air_bersih == 1)
                                                <td>Sumur / Sungai / Air Hujan</td>
                                            @elseif ($participant->sumber_air_bersih == 2)
                                                <td>Air Ledeng PDAM</td>
                                            @elseif ($participant->sumber_air_bersih == 3)
                                                <td>Air Kemasan Bermerk / Isi Ulang</td>  
                                            @endif
                                            <td>{{ $participant -> sumber_air_bersih }}</td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Konsumsi Daging Susu Ayam</td>
                                            @if ($participant->konsumsi_dsa == 1)
                                                <td>Tidak Ada</td>
                                            @elseif ($participant->konsumsi_dsa == 2)
                                                <td>1 Kali Seminggu</td>
                                            @elseif ($participant->konsumsi_dsa == 3)
                                                <td>2 Kali Seminggu</td>
                                            @elseif ($participant->konsumsi_dsa == 4)
                                                <td>3 Kali Seminggu</td>  
                                            @elseif ($participant->konsumsi_dsa == 5)
                                                <td>4-7 Kali Seminggu</td>  
                                            @endif
                                            <td>{{ $participant -> konsumsi_dsa }}</td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Makan Perhari</td>
                                            @if ($participant->makan_perhari == 1)
                                                <td>1x</td>
                                            @elseif ($participant->makan_perhari == 2)
                                                <td>2x</td>
                                            @elseif ($participant->makan_perhari == 3)
                                                <td>3x</td>  
                                            @endif
                                            <td>{{ $participant -> makan_perhari }}</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Pendidikan Kepala Rumah Tangga</td>
                                            @if ($participant->makan_perhari == 1)
                                                <td>Tidak Sekolah</td>
                                            @elseif ($participant->pendidikan_krt == 2)
                                                <td>SD</td>
                                            @elseif ($participant->pendidikan_krt == 3)
                                                <td>SMP</td>  
                                            @elseif ($participant->pendidikan_krt == 4)
                                                <td>SMA</td>  
                                            @elseif ($participant->pendidikan_krt == 5)
                                                <td>D3</td>  
                                            @elseif ($participant->pendidikan_krt == 6)
                                                <td>S1</td>  
                                            @elseif ($participant->pendidikan_krt == 7)
                                                <td>S2</td>  
                                            @elseif ($participant->pendidikan_krt == 8)
                                                <td>S3</td>  
                                            @endif
                                            <td>{{ $participant -> pendidikan_krt }}</td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>Kendaraan Pribadi</td>
                                            @if ($participant->kendaraan_pribadi == 1)
                                                <td>Rp 0 - 1.000.000</td>  
                                            @elseif ($participant->kendaraan_pribadi == 2)
                                                <td>Rp 1.000.100 - 3.000.000</td>  
                                            @elseif ($participant->kendaraan_pribadi == 3)
                                                <td>Rp 3.000.100 - 5.000.000</td>  
                                            @elseif ($participant->kendaraan_pribadi == 4)
                                                <td>Rp 5.000.100 - 8.000.000</td>  
                                            @elseif ($participant->kendaraan_pribadi == 5)
                                                <td>Rp 8.000.100 - 15.000.000</td>  
                                            @elseif ($participant->kendaraan_pribadi == 6)
                                                <td>Di Atas Rp 15.000.000</td>  
                                            @endif
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