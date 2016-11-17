@extends('layouts.layouts')

@push('css')
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
           <header class="panel-heading">
                Tambahkan Rencana Makanan
            </header>
            <div class="panel-body">              
                <div class="row">
                  <div class="col-xs-6 col-sm-3">
                    <h5>Asal Pelabuhan :<strong style="color: red;">@foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyages->rutes['asal'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach</strong style="color: red;"></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Tujuan Pelabuhan : <strong style="color: red;">@foreach($pelabuhans as $pelabuhan)
                                @if($pelabuhan->id_pelabuhan==$voyages->rutes['tujuan'])
                                 {{$pelabuhan->nama_pelabuhan}}
                                @endif
                              @endforeach</strong></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Keberangkatan : <strong style="color: red;">{{$voyages->keberangkatan}}</strong></h5>
                  </div>
                  <div class="col-xs-6 col-sm-3">
                    <h5>Durasi : <strong style="color: red;">{{$voyages->rutes['est_rute']}} Hari</strong></h5>
                  </div>
                </div>
                <div class="form-group">
                <form class="form-horizontal tasi-form" method="post">
                <input type="hidden" name="id_pelayaran" value="{{$_GET['id']}}">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hari</label>
                    <div class="col-sm-10">
                        <select name="hari" class="form-control">
                            <?php $hari = 1; ?>
                            @for($i=0;$i<$voyages->rutes['est_rute'];$i++)
                              @if(!$day->isEmpty())
                                  @foreach($day as $no => $days)
                                @if($day[$no]->hari == $hari)
                                @else
                                  @if($hari<=$voyages->rutes['est_rute'])
                                  <option value="{{$hari}}">Hari ke- {{$hari}}</option>
                                  @endif
                                @endif
                              <?php $hari++ ?>
                              @endforeach
                              @else
                                  <option value="{{$hari}}">Hari ke- {{$hari}}</option>
                                  <?php $hari++ ?>
                              @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="alert alert-block alert-info fade in">
                         <center><strong>SARAPAN</strong></center>
                    </div>
                </div>                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Sarapan Eksekutif</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sarapan_eksekutif">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Sarapan Bisnis</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sarapan_bisnis">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sarapan Ekonomi 1</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sarapan_ekonomi1">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sarapan Ekonomi 2</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sarapan_ekonomi2">
                                @foreach($sarapans as $sarapan)
                                <option value="{{$sarapan->id}}">
                                  {{$sarapan->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="alert alert-block alert-info fade in">
                         <center><strong>MAKAN SIANG</strong></center>
                    </div>
                </div>                      
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Makan Siang Eksekutif</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="siang_eksekutif">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Makan Siang Bisnis</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="siang_bisnis">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Makan Siang Ekonomi 1</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="siang_ekonomi1">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Makan Siang Ekonomi 2</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="siang_ekonomi2">
                                @foreach($makansiangs as $makansiang)
                                <option value="{{$makansiang->id}}">
                                  {{$makansiang->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="alert alert-block alert-info fade in">
                         <center><strong>MAKAN MALAM</strong></center>
                    </div>
                </div>                      
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Makan Malam Eksekutif</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="malam_eksekutif">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Makan Malam Bisnis</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="malam_bisnis">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Makan Malam Ekonomi1</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="malam_ekonomi1">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Makan Malam Ekonomi2</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="malam_ekonomi2">
                                @foreach($makanmalams as $makanmalam)
                                <option value="{{$makanmalam->id}}">
                                  {{$makanmalam->nama}}
                                </option>
                                @endforeach
                          </select>
                    </div>
                </div>                                  
                <div class="form-group">
                     <span class="pull-right" style="margin-right: 10px;">
                     <button class="btn btn-success" type="submit">
                               Tambah Data <span class="fa fa-chevron-right"></span>
                            </button>
                      </span>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                      <span class="pull-left" style="margin-left: 10px;">
                           <a href="/food-plans?success=1"><button type="button" class="btn btn-danger">
                                    <span class="fa fa-chevron-left"></span> Batal
                                  </button></span></a>
                         </span>
                </div>
                </div>
                </form>
            </div>
            </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('js')

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>

  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>

  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

  <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="js/respond.min.js" ></script>


  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <!--script for this page-->
  <script src="js/form-component.js"></script>

@endpush