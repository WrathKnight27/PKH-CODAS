@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
  <!-- top tiles -->
  <?php
      $totalpeserta = DB::table('participants')->count();
      $pesertaverifikasi = DB::table('participants')->where('status_verifikasi', 1)->count();
      $seleksicodas = DB::table('participants')->where('status_codas', 1)->count();
      $seleksipkh = DB::table('participants')->where('status_pkh', 1)->count();
      $danateralokasi = DB::table('participants')->sum('nilai_bantuan');
      $danatotal = DB::table('variablesets')->sum('budgetquota');
      $dt = $danateralokasi / 1000000 ;
      $dtot = $danatotal /1000000 ;
      $n1 = DB::table('pkhstats')->where('id',1)->value('receiver');
      $n2 = DB::table('pkhstats')->where('id',2)->value('receiver');
      $n3 = DB::table('pkhstats')->where('id',3)->value('receiver');
      $n4 = DB::table('pkhstats')->where('id',4)->value('receiver');
      $n5 = DB::table('pkhstats')->where('id',5)->value('receiver');
      $m2 = DB::table('pkhstats')->where('id',2)->value('budget');
      $m1 = DB::table('pkhstats')->where('id',1)->value('budget');
      $m3 = DB::table('pkhstats')->where('id',3)->value('budget');
      $m4 = DB::table('pkhstats')->where('id',4)->value('budget');
      $m5 = DB::table('pkhstats')->where('id',5)->value('budget');
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
      <span class="count_top"><i class="fa fa-money"></i>  Dana Teralokasi (Juta)</span>
      <div class="count"> {{$dt}} </div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>10% </i> dari periode lalu</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-money"></i>  Total Dana (Juta)</span>
      <div class="count"> {{$dtot}} </div>
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
            <div id="graph_anu" style="width:100%; height:300px;"></div>
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
            <div class="demo-container">
              <div id="graph_nunu" style="width:100%; height:300px;"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- /line graph -->
  <br />

</div>
@endsection

@section('js')
<script src="{{ asset('assets/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/vendors/morris.js/morris.min.js')}}"></script>
    <script>
    $(document).ready(function() {
      Morris.Line({
          element: 'graph_anu',
          xkey: 'year',
          ykeys: ['value'],
          labels: ['Value'],
          hideHover: 'auto',
          lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          data: [
          {year: '2014', value: {{$n1}}},
          {year: '2015', value: {{$n2}}},
          {year: '2016', value: {{$n3}}},
          {year: '2017', value: {{$n4}}},
          {year: '2018', value: {{$n5}}}
          ],
          resize: true
        });
        Morris.Line({
          element: 'graph_nunu',
          xkey: 'year',
          ykeys: ['value'],
          labels: ['Value'],
          hideHover: 'auto',
          lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          data: [
          {year: '2014', value: {{$m1}}},
          {year: '2015', value: {{$m2}}},
          {year: '2016', value: {{$m3}}},
          {year: '2017', value: {{$m4}}},
          {year: '2018', value: {{$m5}}}
          ],
          resize: true
        });
    })
    console.log($('#graph_anu').length)
      
    </script>
@endsection