@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
  <!-- top tiles -->
  <?php
      $totalpeserta = DB::table('participants')->count();
      $pesertaverifikasi = DB::table('participants')->where('status_verifikasi', 1)->count();
      $seleksicodas = DB::table('participants')->where('status_codas', 1)->count();
      $seleksipkh = DB::table('participants')->where('status_pkh', 1)->count();
  ?>
  <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i>  Total Peserta</span>
      <div class="count">{{$totalpeserta}}</div>
      <span class="count_bottom"><i class="green">7% </i> dari periode lalu</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i>  Peserta Terverifikasi</span>
      <div class="count">{{$pesertaverifikasi}}</div>
      <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>3% </i> dari periode lalu</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i>  Hasil Seleksi CODAS</span>
      <div class="count">{{$seleksicodas}}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>14% </i> dari periode lalu</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i>  Hasil Seleksi Akhir</span>
      <div class="count green">{{$seleksipkh}}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>7% </i> dari periode lalu</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-money"></i>  Total Anggaran (Juta)</span>
      <div class="count">35.000</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>10% </i> dari periode lalu</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-money"></i>  Anggaran Periode Ini (Juta)</span>
      <div class="count">0,528</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> dari periode lalu</span>
    </div>
  </div>
  <!-- /top tiles -->

  <!-- line graph -->
  <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Jumlah Penerima Manfaat <small>Berdasarkan Tahun</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content2">
            <div id="graph_line" style="width:100%; height:300px;"></div>
          </div>
        </div>
      </div>
      <!-- /line graph -->
      <!-- line graph -->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="dashboard_graph x_panel">
          <div class="row x_title">
            <div class="col-md-6">
              <h2>Jumlah Anggaran <small>Berdasarkan Tahun</small></h2>
            </div>
            
          </div>
          <div class="x_content">
            <div class="demo-container" style="height:290px">
              <div id="chart_plot_03" class="demo-placeholder"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- /line graph -->
  <br />

</div>
@endsection
