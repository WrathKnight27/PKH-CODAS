@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Panel Admin</h3>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reset Hasil Perhitungan </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p style="text-align: justify;">
                            Melakukan reset hasil perhitungan akan mengembalikan nilai default pada beberapa variabel di dalam tabel peserta seleksi.</br>
                            Variabel yang terdampak mencakup rij, Ei, Ti, Hi, Status Codas, Status PKH, Ranking, & Nilai Bantuan.
                        </p>
                        <form action="/adminpanel/countreset" method="post" id="form_count_reset" data-parsley-validate class="form-horizontal form-label-left">
                        @method('patch')
                        {{ csrf_field() }}
                        <div>
                            <button class="btn btn-danger" type="submit" value="Reset Data">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Atur Variabel Konstanta Seleksi </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="/adminpanel/variableedit" method="post" id="form_variable_edit" data-parsley-validate class="form-horizontal form-label-left">
                        @method('patch')
                        {{ csrf_field() }}
                        @foreach ($variablesets as $variableset)
                        
                        <div class="form-group">
                            <label for="parameter" class="control-label col-md-3 col-sm-3 col-xs-12">Parameter Ambang Batas (τ) </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="parameter" name="parameter" value="{{$variableset->parameter}}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Metode Budgeting </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="budgeting" name="budgeting" class="form-control" required="required">
                                    <option value='0' >Pilih..</option>
                                    <option value='1' >Persentase Peserta</option>
                                    <option value='2' >Jumlah Peserta</option>
                                    <option value='3' >Jumlah Dana Bantuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="percentquota" name="percentquota" hidden>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kuota">Kuota Seleksi (%) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="percent" name="percent" value="{{$variableset->percentquota}}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" id="numberquota" name="numberquota" hidden>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kuota">Kuota Seleksi (Jumlah) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="number" name="number" value="{{$variableset->numberquota}}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" id="budgetquota" name="budgetquota" hidden>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kuota">Jumlah Anggaran (Rp)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="budget" name="budget" value="{{$variableset->budgetquota}}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                            <div class="ln_solid"></div>
                            <div>
                                <button class="btn btn-success" type="submit" value="Simpan Variabel">Simpan</button>
                            </div>
                        @endforeach
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Verifikasi Peserta Seleksi </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="/adminpanel/verifdata" method="post" id="form_varif_data" data-parsley-validate class="form-horizontal form-label-left">
                        @method('patch')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="parameter" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah peserta yang akan diverifikasi </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="verifnumber" name="verifnumber" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                            <div class="ln_solid"></div>
                            <div>
                                <button class="btn btn-success" type="submit" value="Verifikasi Peserta">Verifikasi</button>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
     $("#budgeting").change(function() {
        console.log($("#budgeting option:selected").val());
        if ($("#budgeting option:selected").val() == '1') {
            $('#percentquota').prop('hidden', false);
            $('#numberquota').prop('hidden', true);
            $('#budgetquota').prop('hidden', true);
        } else if ($("#budgeting option:selected").val() == '2') {
            $('#percentquota').prop('hidden', true);
            $('#numberquota').prop('hidden', false);
            $('#budgetquota').prop('hidden', true);
        } else if ($("#budgeting option:selected").val() == '3')  {
            $('#percentquota').prop('hidden', true);
            $('#numberquota').prop('hidden', true);
            $('#budgetquota').prop('hidden', false);
        } else {
            $('#percentquota').prop('hidden', true);
            $('#numberquota').prop('hidden', true);
            $('#budgetquota').prop('hidden', true);
        }
    });
    </script>
@endsection