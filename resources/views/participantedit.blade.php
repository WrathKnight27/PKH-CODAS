@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Edit <small>Data Peserta</small></h3>
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
                    <form action="/participants/{{ $participant->id }}" method="post" id="form_profil" data-parsley-validate class="form-horizontal form-label-left">
                      @method('patch')
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_krt">Nama Kepala Keluarga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_krt" name="nama_krt" value="{{$participant->nama_krt}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kk">Nomor Kartu Keluarga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="no_kk" name="no_kk" value="{{$participant->no_kk}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Telepon </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="no_telp" value="{{$participant->no_telp}}" class="form-control col-md-7 col-xs-12" type="text" name="no_telp">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" value="{{$participant->email}}" class="form-control col-md-7 col-xs-12" type="text" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jalan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_jalan" name="alamat_jalan" value="{{$participant->alamat_jalan}}" class="form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Gang </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_gang" value="{{$participant->alamat_gang}}" class="form-control col-md-7 col-xs-12" type="text" name="alamat_gang">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Rumah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_no_rumah" value="{{$participant->alamat_no_rumah}}" class="form-control col-md-7 col-xs-12" type="text" name="alamat_no_rumah">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="alamat_kecamatan" class="form-control">
                            <option {{ $participant->alamat_kecamatan == "Pontianak Timur" ? 'selected' : '' }}>Pontianak Timur</option>
                            <option {{ $participant->alamat_kecamatan == "Pontianak Barat" ? 'selected' : '' }}>Pontianak Barat</option>
                            <option {{ $participant->alamat_kecamatan == "Pontianak Utara" ? 'selected' : '' }}>Pontianak Utara</option>
                            <option {{ $participant->alamat_kecamatan == "Pontianak Selatan" ? 'selected' : '' }}>Pontianak Selatan</option>
                            <option {{ $participant->alamat_kecamatan == "Pontianak Kota" ? 'selected' : '' }}>Pontianak Kota</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="alamat_kota" class="form-control">
                            <option {{ $participant->alamat_kota == "Pontianak" ? 'selected' : '' }}>Pontianak</option>
                            <option {{ $participant->alamat_kota == "Banjarmasin" ? 'selected' : '' }}>Banjarmasin</option>
                            <option {{ $participant->alamat_kota == "Balikpapan" ? 'selected' : '' }}>Balikpapan</option>
                            <option {{ $participant->alamat_kota == "Samarinda" ? 'selected' : '' }}>Samarinda</option>
                            <option {{ $participant->alamat_kota == "Tanjung Selor" ? 'selected' : '' }}>Tanjung Selor</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="alamat_provinsi" class="form-control">
                            <option {{ $participant->alamat_provinsi == "Kalimantan Barat" ? 'selected' : '' }}>Kalimantan Barat</option>
                            <option {{ $participant->alamat_provinsi == "Kalimantan Timur" ? 'selected' : '' }}>Kalimantan Timur</option>
                            <option {{ $participant->alamat_provinsi == "Kalimantan Utara" ? 'selected' : '' }}>Kalimantan Utara</option>
                            <option {{ $participant->alamat_provinsi == "Kalimantan Selatan" ? 'selected' : '' }}>Kalimantan Selatan</option>
                            <option {{ $participant->alamat_provinsi == "Kalimantan Tengah" ? 'selected' : '' }}>Kalimantan Tengah</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendapatan Perbulan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="pendapatan" class="form-control">
                            <option value=0 {{ $participant->pendapatan == 0 ? 'selected' : '' }}>Rp 0 - Rp 500.000</option>
                            <option value=1 {{ $participant->pendapatan == 1 ? 'selected' : '' }}>Rp 500.100 - 1.000.000</option>
                            <option value=2 {{ $participant->pendapatan == 2 ? 'selected' : '' }}>Rp 1.000.100 - 2.000.000</option>
                            <option value=3 {{ $participant->pendapatan == 3 ? 'selected' : '' }}Rp 2.000.100 - 3.000.000</option>
                            <option value=4 {{ $participant->pendapatan == 4 ? 'selected' : '' }}Rp 3.000.100 - 5.000.000</option>
                            <option value=5 {{ $participant->pendapatan == 5 ? 'selected' : '' }}Rp 5.000.100 - 7.000.000</option>
                            <option value=6 {{ $participant->pendapatan == 6 ? 'selected' : '' }}Di Atas Rp 7.000.000</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tabungan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="tabungan" class="form-control">
                            <option value=0 {{ $participant->tabungan == 0 ? 'selected' : '' }}>Rp 0 - Rp 1.000.000</option>
                            <option value=1 {{ $participant->tabungan == 1 ? 'selected' : '' }}>Rp 1.000.100 - Rp 2.000.000</option>
                            <option value=2 {{ $participant->tabungan == 2 ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.000.000</option>
                            <option value=3 {{ $participant->tabungan == 3 ? 'selected' : '' }}>Rp 4.000.100 - Rp 6.000.000</option>
                            <option value=4 {{ $participant->tabungan == 4 ? 'selected' : '' }}>Rp 6.000.100 - 8.000.000</option>
                            <option value=5 {{ $participant->tabungan == 5 ? 'selected' : '' }}>Rp 8.000.100 - 10.000.000</option>
                            <option value=6 {{ $participant->tabungan == 6 ? 'selected' : '' }}>Di Atas Rp 10.000.000</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Luas Bangunan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="luas_bangunan" class="form-control">
                            <option value=0 {{ $participant->luas_bangunan == 0 ? 'selected' : '' }}>0-10 meter persegi</option>
                            <option value=1 {{ $participant->luas_bangunan == 1 ? 'selected' : '' }}>10-20 meter persegi</option>
                            <option value=2 {{ $participant->luas_bangunan == 2 ? 'selected' : '' }}>20-30 meter persegi</option>
                            <option value=3 {{ $participant->luas_bangunan == 3 ? 'selected' : '' }}>30-40 meter persegi</option>
                            <option value=4 {{ $participant->luas_bangunan == 4 ? 'selected' : '' }}>40++ meter persegi</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Luas Tanah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="luas_tanah" class="form-control">
                            <option value=0 {{ $participant->luas_tanah == 0 ? 'selected' : '' }}>0-20 meter persegi</option>
                            <option value=1 {{ $participant->luas_tanah == 1 ? 'selected' : '' }}>20-40 meter persegi</option>
                            <option value=2 {{ $participant->luas_tanah == 2 ? 'selected' : '' }}>40-60 meter persegi</option>
                            <option value=3 {{ $participant->luas_tanah == 3 ? 'selected' : '' }}>60-80 meter persegi</option>
                            <option value=4 {{ $participant->luas_tanah == 4 ? 'selected' : '' }}>80++ meter persegi</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fasilitas BAB </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_bab_1" name="fasilitas_bab" {{ $participant->fasilitas_bab == 1 ? 'checked' : ''}}> Layak
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="0" id="opt_bab_2" name="fasilitas_bab" {{ $participant->fasilitas_bab == 0 ? 'checked' : ''}}> Tidak Layak
                                </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lantai Rumah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_floor_1" name="jenis_lantai" {{ $participant->jenis_lantai == 1 ? 'checked' : ''}}> Layak
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="0" id="opt_floor_2" name="jenis_lantai" {{ $participant->jenis_lantai == 0 ? 'checked' : ''}}> Tidak Layak
                                </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dinding Rumah </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_wall_1" name="jenis_dinding" {{ $participant->jenis_dinding == 1 ? 'checked' : ''}}> Layak
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="0" id="opt_wall_2" name="jenis_dinding" {{ $participant->jenis_dinding == 0 ? 'checked' : ''}}> Tidak Layak
                                </label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Akses Air Bersih </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="sumber_air_bersih" class="form-control">
                            <option value=0 {{ $participant->sumber_air_bersih == 0 ? 'selected' : '' }}>Sumur / Sungai / Air Hujan</option>
                            <option value=1 {{ $participant->sumber_air_bersih == 1 ? 'selected' : '' }}>Air Ledeng PDAM</option>
                            <option value=2 {{ $participant->sumber_air_bersih == 2 ? 'selected' : '' }}>Air Kemasan Bermerk / Isi Ulang</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pengobatan </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="biaya_pengobatan" class="form-control">
                            <option value=0 {{ $participant->biaya_pengobatan == 0 ? 'selected' : '' }}>Rp 0-200000</option>
                            <option value=1 {{ $participant->biaya_pengobatan == 1 ? 'selected' : '' }}>Rp 200000-500000</option>
                            <option value=2 {{ $participant->biaya_pengobatan == 2 ? 'selected' : '' }}>Rp 500000++</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pemakaian Listrik PLN </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="pemakaian_listrik" class="form-control">
                            <option value=0 {{ $participant->pemakaian_listrik == 0 ? 'selected' : '' }}>Tidak Ada</option>
                            <option value=1 {{ $participant->pemakaian_listrik == 1 ? 'selected' : '' }}>450 VA</option>
                            <option value=2 {{ $participant->pemakaian_listrik == 2 ? 'selected' : '' }}>900 VA</option>
                            <option value=3 {{ $participant->pemakaian_listrik == 3 ? 'selected' : '' }}>1300 VA</option>
                            <option value=4 {{ $participant->pemakaian_listrik == 4 ? 'selected' : '' }}>2200 VA</option>
                            <option value=5 {{ $participant->pemakaian_listrik == 5 ? 'selected' : '' }}>5500 VA</option>
                            <option value=6 {{ $participant->pemakaian_listrik == 6 ? 'selected' : '' }}>14000 VA</option>
                            <option value=7 {{ $participant->pemakaian_listrik == 7 ? 'selected' : '' }}>200000 VA</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Bakar Memasak </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="bahan_bakar_masak" class="form-control">
                            <option value=0 {{ $participant->bahan_bakar_masak == 0 ? 'selected' : '' }}>Kayu Bakar</option>
                            <option value=1 {{ $participant->bahan_bakar_masak == 1 ? 'selected' : '' }}>Elpiji 3KG</option>
                            <option value=2 {{ $participant->bahan_bakar_masak == 2 ? 'selected' : '' }}>Bright Gas 5,5KG</option>
                            <option value=3 {{ $participant->bahan_bakar_masak == 3 ? 'selected' : '' }}>Elpiji / Bright Gas 12KG</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Konsumsi Protein </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="konsumsi_dsa" class="form-control">
                            <option value=0 {{ $participant->konsumsi_dsa == 0 ? 'selected' : '' }}>Tidak Ada</option>
                            <option value=1 {{ $participant->konsumsi_dsa == 1 ? 'selected' : '' }}>1 Kali Seminggu</option>
                            <option value=2 {{ $participant->konsumsi_dsa == 2 ? 'selected' : '' }}>2 Kali Seminggu</option>
                            <option value=3 {{ $participant->konsumsi_dsa == 3 ? 'selected' : '' }}>3 Kali Seminggu</option>
                            <option value=4 {{ $participant->konsumsi_dsa == 4 ? 'selected' : '' }}>4-7 Kali Seminggu</option>
                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Membeli Pakaian </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="membeli_pakaian" class="form-control">
                            <option value=0 {{ $participant->membeli_pakaian == 0 ? 'selected' : '' }}>0-1 Kali dalam 1 Tahun</option>
                            <option value=1 {{ $participant->membeli_pakaian == 1 ? 'selected' : '' }}>2-3 Kali dalam 1 Tahun</option>
                            <option value=2 {{ $participant->membeli_pakaian == 2 ? 'selected' : '' }}>4-5 Kali dalam 1 Tahun</option>
                            <option value=3 {{ $participant->membeli_pakaian == 3 ? 'selected' : '' }}>6-7 Kali dalam 1 Tahun</option>
                            <option value=4 {{ $participant->membeli_pakaian == 4 ? 'selected' : '' }}>Di Atas 7 Kali dalam 1 Tahun</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Makan Perhari </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="makan_perhari" class="form-control">
                            <option value=3 {{ $participant->makan_perhari == 3 ? 'selected' : '' }}>3x</option>
                            <option value=2 {{ $participant->makan_perhari == 2 ? 'selected' : '' }}>2x</option>
                            <option value=1 {{ $participant->makan_perhari == 1 ? 'selected' : '' }}>1x</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Kepala Keluarga </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="pendidikan_krt" class="form-control">
                            <option value=0 {{ $participant->pendidikan_krt == 0 ? 'selected' : '' }}>Tidak Sekolah</option>
                            <option value=1 {{ $participant->pendidikan_krt == 1 ? 'selected' : '' }}>SD</option>
                            <option value=2 {{ $participant->pendidikan_krt == 2 ? 'selected' : '' }}>SMP</option>
                            <option value=3 {{ $participant->pendidikan_krt == 3 ? 'selected' : '' }}>SMA</option>
                            <option value=4 {{ $participant->pendidikan_krt == 4 ? 'selected' : '' }}>D3</option>
                            <option value=5 {{ $participant->pendidikan_krt == 5 ? 'selected' : '' }}>S1</option>
                            <option value=6 {{ $participant->pendidikan_krt == 6 ? 'selected' : '' }}>S2</option>
                            <option value=7 {{ $participant->pendidikan_krt == 7 ? 'selected' : '' }}>S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Taksiran Nilai Kendaraan Pribadi </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kendaraan_pribadi" class="form-control">
                            <option value=1 {{ $participant->kendaraan_pribadi == 1 ? 'selected' : '' }}>Rp 0 - Rp 1.000.000</option>
                            <option value=2 {{ $participant->kendaraan_pribadi == 2 ? 'selected' : '' }}>Rp 1.000.100 - Rp 3.000.000</option>
                            <option value=3 {{ $participant->kendaraan_pribadi == 3 ? 'selected' : '' }}>Rp 3.000.100 - Rp 5.000.000</option>
                            <option value=4 {{ $participant->kendaraan_pribadi == 4 ? 'selected' : '' }}>Rp 5.000.100 - Rp 8.000.000</option>
                            <option value=5 {{ $participant->kendaraan_pribadi == 5 ? 'selected' : '' }}>Rp 8.000.100 - Rp 15.000.000</option>
                            <option value=6 {{ $participant->kendaraan_pribadi == 6 ? 'selected' : '' }}>Di Atas Rp 15.000.000</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ibu Hamil </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="ibu_hamil" class="form-control">
                                    <option {{ $participant->ibu_hamil == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->ibu_hamil == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->ibu_hamil == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->ibu_hamil == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->ibu_hamil == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->ibu_hamil == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak Usia Dini </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="usia_dini" class="form-control">
                                    <option {{ $participant->usia_dini == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->usia_dini == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->usia_dini == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->usia_dini == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->usia_dini == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->usia_dini == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak SD </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="anak_sd" class="form-control">
                                    <option {{ $participant->anak_sd == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->anak_sd == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->anak_sd == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->anak_sd == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->anak_sd == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->anak_sd == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak SMP </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="anak_smp" class="form-control">
                                    <option {{ $participant->anak_smp == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->anak_smp == 1 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->anak_smp == 2 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->anak_smp == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->anak_smp == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->anak_smp == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak SMA </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="anak_sma" class="form-control">
                                    <option {{ $participant->anak_sma == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->anak_sma == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->anak_sma == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->anak_sma == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->anak_sma == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->anak_sma == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Disabilitas Berat </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="disabilitas_berat" class="form-control">
                                    <option {{ $participant->disabilitas_berat == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->disabilitas_berat == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->disabilitas_berat == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->disabilitas_berat == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->disabilitas_berat == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->disabilitas_berat == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lanjut Usia </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="lanjut_usia" class="form-control">
                                    <option {{ $participant->lanjut_usia == 0 ? 'selected' : '' }}>0</option>
                                    <option {{ $participant->lanjut_usia == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $participant->lanjut_usia == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $participant->lanjut_usia == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $participant->lanjut_usia == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $participant->lanjut_usia == 5 ? 'selected' : '' }}>Lebih Dari 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Verifikasi Data</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="radio">
                                <label>
                                <input type="radio" value="1" id="opt_ver_1" name="status_verifikasi" {{ $participant->status_verifikasi == 1 ? 'checked' : ''}}> Sudah Terverifikasi
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" value="0" id="opt_ver_2" name="status_verifikasi" {{ $participant->status_verifikasi == 0 ? 'checked' : ''}}> Belum Terverifikasi
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