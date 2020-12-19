@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Edit Kriteria</h3>
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
                    <h2>{{$codascriteria->name}}</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <br />
                    <form action="/codascriteria/{{ $codascriteria->id }}" method="post" id="form_codas_criteria" data-parsley-validate class="form-horizontal form-label-left">
                      @method('patch')
                      {{ csrf_field() }}
            
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kk">Bobot <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="bobot" name="bobot" value="{{$codascriteria->weight}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="aktif" class="control-label col-md-3 col-sm-3 col-xs-12">Aktif </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="aktif" class="form-control">
                            <option value=1 {{ $codascriteria->active == "1" ? 'selected' : '' }}>Ya</option>
                            <option value=0 {{ $codascriteria->active == "0" ? 'selected' : '' }}>Tidak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tipe" class="control-label col-md-3 col-sm-3 col-xs-12">Tipe </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="tipe" class="form-control">
                            <option value=1 {{ $codascriteria->type == "1" ? 'selected' : '' }}>Benefit</option>
                            <option value=0 {{ $codascriteria->type == "0" ? 'selected' : '' }}>Cost</option>
                          </select>
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