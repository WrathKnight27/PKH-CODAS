@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Tambah <small>Peserta Baru</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-2 col-sm-4 col-xs-1 pull-right">
                    <a href="/participants" class="btn btn-primary" type="button">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil <small>Keluarga</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="/participants" method="post" id="form_profil" data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_krt">Nama Kepala Keluarga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_krt" name="nama_krt" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kk">Nomor Kartu Keluarga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="no_kk" name="no_kk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Telepon </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="no_telp" class="form-control col-md-7 col-xs-12" type="text" name="no_telp">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jalan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_jalan" name="alamat_jalan" class="form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Gang </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_gang" class="form-control col-md-7 col-xs-12" type="text" name="alamat_gang">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Rumah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_no_rumah" class="form-control col-md-7 col-xs-12" type="text" name="alamat_no_rumah">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="alamat_kecamatan" class="form-control">
                            <option>Pontianak Timur</option>
                            <option>Pontianak Barat</option>
                            <option>Pontianak Utara</option>
                            <option>Pontianak Selatan</option>
                            <option>Pontianak Tengah</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="alamat_kota" class="form-control">
                            <option>Pontianak</option>
                            <option>Banjarmasin</option>
                            <option>Balikpapan</option>
                            <option>Samarinda</option>
                            <option>Tanjung Selor</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="alamat_provinsi" class="form-control">
                            <option>Kalimantan Barat</option>
                            <option>Kalimantan Timur</option>
                            <option>Kalimantan Utara</option>
                            <option>Kalimantan Selatan</option>
                            <option>Kalimantan Kota</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendapatan Perbulan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="pendapatan" class="form-control">
                            <option value=1>Rp 0 - Rp 500.000</option>
                            <option value=2>Rp 500.100 - 1.000.000</option>
                            <option value=3>Rp 1.000.100 - 2.000.000</option>
                            <option value=4>Rp 2.000.100 - 3.000.000</option>
                            <option value=5>Rp 3.000.100 - 5.000.000</option>
                            <option value=6>Rp 5.000.100 - 7.000.000</option>
                            <option value=7>Di Atas Rp 7.000.000</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tabungan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="tabungan" class="form-control">
                            <option value=1>Rp 0 - Rp 1.000.000</option>
                            <option value=2>Rp 1.000.100 - Rp 2.000.000</option>
                            <option value=3>Rp 2.000.000 - Rp 4.000.000</option>
                            <option value=4>Rp 4.000.100 - Rp 6.000.000</option>
                            <option value=5>Rp 6.000.100 - 8.000.000</option>
                            <option value=6>Rp 8.000.100 - 10.000.000</option>
                            <option value=7>Di Atas Rp 10.000.000</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Luas Bangunan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="luas_bangunan" class="form-control">
                            <option value=1>0-10 meter persegi</option>
                            <option value=2>10-20 meter persegi</option>
                            <option value=3>20-30 meter persegi</option>
                            <option value=4>30-40 meter persegi</option>
                            <option value=5>40++ meter persegi</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Luas Tanah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="luas_tanah" class="form-control">
                            <option value=1>0-20 meter persegi</option>
                            <option value=2>20-40 meter persegi</option>
                            <option value=3>40-60 meter persegi</option>
                            <option value=4>60-80 meter persegi</option>
                            <option value=5>80++ meter persegi</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fasilitas BAB </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" checked="" value="2" id="opt_bab_1" name="fasilitas_bab"> Layak
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_bab_2" name="fasilitas_bab"> Tidak Layak
                                </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lantai Rumah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" checked="" value="2" id="opt_floor_1" name="jenis_lantai"> Layak
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_floor_2" name="jenis_lantai"> Tidak Layak
                                </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dinding Rumah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" checked="" value="2" id="opt_wall_1" name="jenis_dinding"> Layak
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_wall_2" name="jenis_dinding"> Tidak Layak
                                </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Air Bersih </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="sumber_air_bersih" class="form-control">
                            <option value=1>Sumur / Sungai / Air Hujan</option>
                            <option value=2>Air Ledeng PDAM</option>
                            <option value=3>Air Kemasan Bermerk / Isi Ulang</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pengobatan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="biaya_pengobatan" class="form-control">
                            <option value=1>Rp 0-200000</option>
                            <option value=2>Rp 200000-500000</option>
                            <option value=3>Rp 500000++</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pemakaian Listrik PLN </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="pemakaian_listrik" class="form-control">
                            <option value=1>Tidak Ada</option>
                            <option value=2>450 VA</option>
                            <option value=3>900 VA</option>
                            <option value=4>1300 VA</option>
                            <option value=5>2200 VA</option>
                            <option value=6>5500 VA</option>
                            <option value=7>14000 VA</option>
                            <option value=8>200000 VA</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Bakar Memasak </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="bahan_bakar_masak" class="form-control">
                            <option value=1>Kayu Bakar</option>
                            <option value=2>Elpiji 3KG</option>
                            <option value=3>Bright Gas 5,5KG</option>
                            <option value=4>Elpiji / Bright Gas 12KG</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Konsumsi Daging/Susu/Ayam </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="konsumsi_dsa" class="form-control">
                            <option value=1>Tidak Ada</option>
                            <option value=2>1 Kali Seminggu</option>
                            <option value=3>2 Kali Seminggu</option>
                            <option value=4>3 Kali Seminggu</option>
                            <option value=5>4-7 Kali Seminggu</option>
                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Membeli Pakaian </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="membeli_pakaian" class="form-control">
                            <option value=1>0-1 Kali dalam 1 Tahun</option>
                            <option value=2>2-3 Kali dalam 1 Tahun</option>
                            <option value=3>4-5 Kali dalam 1 Tahun</option>
                            <option value=4>6-7 Kali dalam 1 Tahun</option>
                            <option value=5>Di Atas 7 Kali dalam 1 Tahun</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Makan Perhari </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="makan_perhari" class="form-control">
                            <option value=3>3x</option>
                            <option value=2>2x</option>
                            <option value=1>1x</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Kepala Keluarga </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="pendidikan_krt" class="form-control">
                            <option value=1>Tidak Sekolah</option>
                            <option value=2>SD</option>
                            <option value=3>SMP</option>
                            <option value=4>SMA</option>
                            <option value=5>D3</option>
                            <option value=6>S1</option>
                            <option value=7>S2</option>
                            <option value=8>S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Taksiran Nilai Kendaraan Pribadi </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kendaraan_pribadi" class="form-control">
                            <option value=1>Rp 0 - Rp 1.000.000</option>
                            <option value=2>Rp 1.000.100 - Rp 3.000.000</option>
                            <option value=3>Rp 3.000.100 - Rp 5.000.000</option>
                            <option value=4>Rp 5.000.100 - Rp 8.000.000</option>
                            <option value=5>Rp 8.000.100 - Rp 15.000.000</option>
                            <option value=6>Di Atas Rp 15.000.000</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ibu Hamil </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="ibu_hamil" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak Usia Dini </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="usia_dini" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak SD </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="anak_sd" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak SMP </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="anak_smp" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak SMA </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="anak_sma" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Disabilitas Berat </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="disabilitas_berat" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lanjut Usia </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="lanjut_usia" class="form-control">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Terverifikasi</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" value="1" id="opt_ver_1" name="status_verifikasi"> Sudah Terverifikasi
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" value="0" id="opt_ver_2" name="status_verifikasi"> Belum Terverifikasi
                            </label>
                          </div>
                        </div>
                      </div>
                        <div class="ln_solid"></div>
                        <div class="col-md-4 col-sm-4 col-xs-1 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Reset</button>
                            <button class="btn btn-success" type="submit" value="Simpan Data">Simpan</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>

        

    </div>

    

    
</div>
<!-- /page content -->
@endsection