@extends('layouts.layouts')

@push('css')
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />


    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
           <header class="panel-heading">
                Tambahkan Rencana Pelayaran
            </header>
            <div class="panel-body">
                    @if($_GET['success']==0)
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Rute</strong> yang kamu masuk kan tidak ditemukan! . Periksa kembali atau <a href="/rute">Tambahkan Rute Baru!</a>
                    </div>
                    @endif
	              <form class="form-horizontal tasi-form" method="post">
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Rute</label>
	                  <div class="col-sm-10">
                        <select name="id_rute" class="form-control">
                        @foreach($rutes as $rute)
                            <?php $asal; $tujuan; ?>
                            @foreach($pelabuhans as $pelabuhan)
                              @if($pelabuhan->id_pelabuhan==$rute->asal)
                               {{$asal = $pelabuhan->nama_pelabuhan}}
                              @endif
                              @if($pelabuhan->id_pelabuhan==$rute->tujuan)
                               {{$tujuan = $pelabuhan->nama_pelabuhan}}
                              @endif
                            @endforeach
                            <option value="{{$rute->id}}">
                              {{$asal}} => {{$tujuan}}
                            </option>
                          @endforeach
                        </select>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Berangkat</label>
	                  <div class="col-sm-10">
                        <input type="text" name="tgl_keberangkatan" class="form-control form-control-inline input-medium default-date-picker" size="16" required="">
	                  </div>
	              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jam Berangkat</label>
                    <div class="col-sm-10">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text" class="form-control timepicker-24" name="jam_keberangkatan" required="">
                              <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                              </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Pelayaran</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kapal</label>
                    <div class="col-sm-10">
                        <select name="id_kapal" class="form-control" required="">
                        @foreach($kapals as $kapal)
                            <option value="{{$kapal->id}}">{{$kapal->nama_kapal}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="alert alert-block alert-info fade in">
                         <center><strong>DATA PENUMPANG</strong></center>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Eksekutif</label>
                    <div class="col-sm-10">
                        <input type="number" name="eksekutif" class="form-control" min="0" value="0" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Bisnis</label>
                    <div class="col-sm-10">
                        <input type="number" name="bisnis" class="form-control" min="0" value="0" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ekonomi 1</label>
                    <div class="col-sm-10">
                        <input type="number" name="ekonomi1" class="form-control" min="0" value="0" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ekonomi 2</label>
                    <div class="col-sm-10">
                        <input type="number" name="ekonomi2" class="form-control" min="0" value="0" required="">
                    </div>
                </div>
	              <div class="form-group">
	              		 <span class="pull-right" style="margin-right: 10px;">
	              		 <button class="btn btn-success" type="submit" data-toggle="modal">
                               Tambah Data <span class="fa fa-chevron-right"></span>
                            </button>
                      </span>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                      <span class="pull-left" style="margin-left: 10px;">
                           <a href="/voyages?success=1"><button type="button" class="btn btn-danger" data-toggle="modal">
                                    <span class="fa fa-chevron-left"></span> Batal
                                  </button></a>
                         </span>
	              </div>
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
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
  
    <!--this page plugins-->

  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--this page  script only-->
    <script src="js/advanced-form-components.js"></script>

@endpush