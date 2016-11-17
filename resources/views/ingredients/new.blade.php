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
                Tambahkan Bahan
            </header>
            <div class="panel-body">
	              <form class="form-horizontal tasi-form" method="post">
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Nama bahan</label>
	                  <div class="col-sm-10">
	                      <input type="text" class="form-control" name="nama" required="">
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
	                  <div class="col-sm-10">
                        <select class="form-control" name="id_kategori" required="">
                          @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->nama}}</option>
                          @endforeach
                        </select>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Satuan Resep</label>
	                  <div class="col-sm-10">
                        <select class="form-control" name="satuan_resep" required="">
                          @foreach($measurements as $measurement)
                            <option value="{{$measurement->id}}">{{$measurement->satuan}}</option>
                          @endforeach
                        </select>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label">Satuan Pembelian</label>
	                  <div class="col-sm-10">
                        <select class="form-control" name="satuan_pembelian" required="">
                          @foreach($measurements as $measurement)
                            <option value="{{$measurement->id}}">{{$measurement->satuan}}</option>
                          @endforeach
                        </select>
	                  </div>
	              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="deskripsi" rows="5" required=""></textarea>
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
                           <a href="/ingredients"><button type="button" class="btn btn-danger" data-toggle="modal">
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