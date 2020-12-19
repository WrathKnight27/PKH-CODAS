@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Profil <small>Peserta</small></h3>
        </div>
        <div class="title_right">
            <div class="col-md-6 col-sm-6 col-xs-5 pull-right">
                <a href="/finalresult" class="btn btn-primary" type="button">Kembali</a>
            </div>
        </div>
    </div>

    @include('partials._profile')
    </div>
</div>
<!-- /page content -->
@endsection