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
                    <a href="/participants" class="btn btn-primary" type="button">Kembali</a>
                    <a href="/participantedit/{{ $participant -> id }}" class="btn btn-warning" type="button">Edit</a>
                    <form action="{{ $participant->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">hapus</button>
                    </form>
                </div>
            </div>
        </div>

        @include('partials._profile')
    </div>
</div>
<!-- /page content -->
@endsection