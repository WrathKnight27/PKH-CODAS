<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplikasi Seleksi PKH Metode CODAS</title>

    <!-- stylesheets content -->
    @include('partials._styles')
    <!-- /stylesheets content -->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <!-- sidebar content -->
        @include('partials._sidebar')
        <!-- /sidebar content -->

        <!-- topbar content -->
        @include('partials._topbar')
        <!-- /topbar content -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Aplikasi Seleksi Penerima Bantuan PKH oleh Tejo Dwi Prasetyo
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- modals content -->
    @include('partials._modals')
    <!-- /modals content -->

    <!-- scripts content -->
    @include('partials._scripts')
    <!-- /scripts content -->
    @yield('js')

  </body>
</html>
