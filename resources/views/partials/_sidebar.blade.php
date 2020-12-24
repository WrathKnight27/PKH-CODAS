<!-- <div class="col-md-3 left_col menu_fixed"> -->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>PKH CODAS</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('assets/images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>Tejo Dwi</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Dashboard </a></li>
                    <li><a href="{{ url('/informations') }}"><i class="fa fa-info"></i> Informasi </a></li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Data</h3>
                <ul class="nav side-menu">
                    <!-- <li><a href="{{ url('/participants') }}"><i class="fa fa-users"></i> Peserta </a></li> -->
                    <li><a><i class="fa fa-users"></i> Peserta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/participants/verified') }}">Terverifikasi</a></li>
                      <li><a href="{{ url('/participants') }}">Semua</a></li>
                    </ul>
                    </li>
                    <li><a href="{{ url('/criteria') }}"><i class="fa fa-check-square-o"></i> Kriteria </a></li>           
                </ul>
            </div>
            <div class="menu_section">
                <h3>Hasil</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('/codasresult') }}"><i class="fa fa-calculator"></i> Hasil CODAS </a></li>
                    <li><a href="{{ url('/finalresult') }}"><i class="fa fa-flag"></i> Hasil Akhir </a></li>
                    <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-cogs"></i> Panel Admin </a></li>           
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>