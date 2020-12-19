@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Edit Kriteria PKH</h3>
            </div>
            <div class="title_right">
                <div class="col-md-2 col-sm-4 col-xs-1 pull-right">
                    <a href="/criteria" class="btn btn-primary" type="button">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{$pkhcriteria->name}}</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <br />
                    <form action="/pkhcriteria/{{ $pkhcriteria->id }}" method="post" id="form_pkh_criteria" data-parsley-validate class="form-horizontal form-label-left">
                      @method('patch')
                      {{ csrf_field() }}
            
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kk">Nilai Bantuan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="nilaibantuan" name="nilaibantuan" value="{{$pkhcriteria->bantuan}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="ln_solid"></div>
                        <div class="col-md-4 col-sm-4 col-xs-1 col-md-offset-3">
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